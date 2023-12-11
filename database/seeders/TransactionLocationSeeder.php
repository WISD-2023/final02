<?php

namespace Database\Seeders;

use App\Models\TransactionLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactionLocations = [
            '正門-警衛室', '東側門-門口', '西側門-門口', '勤益學舍-1F正門口', '養浩學舍-1F正門口',
            '管理管-1F正門口', '國秀樓-1F正門口', '圖書館-1F正門口', '創新研發大樓-1F正門口', '誠樸館-1F正門口',
            '機械館-1F正門口', '行政大樓-1F正門口', '機械館-1F正門口', '工程館-1F正門口', '工業工程與管理管-1F正門口',
            '青永館-1F正門口', '文化休閒館-1F正門口', '工具機械大樓-1F正門口', '7ELEVEN-新勤益門市', 'FamilyMart-太平勤利店'
        ];
        foreach ($transactionLocations as $transactionLocation) {
            TransactionLocation::create([
                'name' => $transactionLocation,
            ]);
        }
    }
}
