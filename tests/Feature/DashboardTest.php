<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\Team0001ActivityNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_displays_live_account_and_notification_data(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $user->notify(new Team0001ActivityNotification(
            'Test activity',
            'This activity came from the database.',
        ));

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertOk();
        $response->assertSee('Test activity');
        $response->assertSee('This activity came from the database.');
        $response->assertSee('1 unread');
    }

    public function test_user_can_mark_a_notification_as_read(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $user->notify(new Team0001ActivityNotification('Read this', 'Read action test.'));
        $notification = $user->fresh()->unreadNotifications()->first();

        $response = $this->actingAs($user)->post(route('notifications.read', $notification->id));

        $response->assertRedirect(route('dashboard'));
        $this->assertNotNull($notification->fresh()->read_at);
    }
}
