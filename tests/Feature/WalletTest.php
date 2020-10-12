<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Wallet;
use App\Models\Tranfer;

class WalletTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testGetWallet()
    {
        $this->withoutExceptionHandling();
        $wallet = Wallet::factory()->create();
        $transfers = Tranfer::factory(3)->create([
            'wallet_id' =>$wallet->id
        ]);
        $response = $this->json('GET', '/api/wallet');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id','money','transfers'=>[
                    '*'=>[
                        'id','amount','description','wallet_id','created_at','updated_at'
                    ]
                ]
            ]);
            $this->assertCount(3,$response->json()['transfers']);
            // dd($wallet->transfers);
    }
}
