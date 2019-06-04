<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Tests\TestCase;

class MessagesControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var User
     */
    protected $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::inRandomOrder()->first();
    }

    /**
     * test of work index page and we can see "home" view and H1 tag.
     */
    public function testIndex(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get('/');
        $response->assertViewIs('home');
        $response->assertSeeText('Сообщения от всех пользователей');
    }

    /**
     * test add message
     */
    public function testAddMessage(): void
    {
        Session::start();
        $this
            ->actingAs($this->user)
            ->post(route('messages.addMessage'), [
                'body'   => $body = Str::random(),
                '_token' => Session::token(),
            ])
            ->assertRedirect(route('index'))
            ->assertSessionHas('success');
        /** @var Collection|Message[] $messages */
        $messages = Message::where([
            'id_owner' => $this->user->id,
            'body'     => $body,
        ])->get();

        $this->assertCount(1, $messages);
        $this->assertDatabaseHas('messages', [
            'id_owner' => $this->user->id,
            'body'     => $body,
        ]);
        // Clean up
        foreach ($messages as $message) {
            $message->delete();
        }
    }

    /**
     * test Delete message
     */
    public function testDeleteMessage(): void
    {
        Session::start();
        $this
            ->actingAs($this->user)
            ->post(route('index'),
                [
                    'body'   => $body = Str::random(),
                    '_token' => Session::token(),
                ])
            ->assertRedirect('/')
            ->assertSessionHas('success');
        /** @var Collection|Message[] $message */
        $message = Message::where([
            'id_owner' => $this->user->id,
            'body'     => $body,
        ])->first();
        $this->assertDatabaseHas('messages', [
            'id_owner' => $this->user->id,
            'body'     => $body,
        ]);

        $response = $this
            ->delete(route('messages.deleteMessage', [$message->id,
                '_token' => Session::token(),
            ]));

        $response->assertRedirect('/');
        // Clean up
        $message->delete();
    }
}
