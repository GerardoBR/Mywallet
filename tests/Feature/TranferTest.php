<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Wallet;
use App\Models\Tranfer;
class TranferTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testTransfer()
    {
        $wallet = Wallet::factory()->create();
        $transfer = Tranfer::factory()->make();
        $response = $this->json('POST','/api/transfer',[
            'description'   =>$transfer->description,
            'amount'        =>$transfer->amount,
            'wallet_id'     =>$wallet->id
        ]);

        $response->assertJsonStructure([
            'id','description','amount','wallet_id'
        ])->assertStatus(201);

        // $response->assertStatus(200);
        $this->assertDatabaseHas('tranfers',[
            'description'   =>$transfer->description,
            'amount'        =>$transfer->amount,
            'wallet_id'     =>$wallet->id
        ]);
        $this->assertDatabaseHas('wallets',[
            'id'=>$wallet->id,
            'money' => $wallet->money +$transfer->amount
        ]);
    }
}
