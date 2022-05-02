<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name' => "Khách hàng",
            'desc' => "Tài khoản của Khách hàng",
            'status' => 1,
        ]);
        // lấy thông tin tất cả các quyền
        $permissions = Permissions::where('parent_id', '!=', 0)->get('id');
        $data = [];
        foreach ($permissions as $p) {
            $data[] = $p->id;
        };

        try {
            DB::beginTransaction();
            $role =  Roles::create([
                'name' => "ADMIN",
                'desc' => "Tài khoản của admin",
                'status' => 1,
            ]);
            $role->permissions()->attach($data);
            DB::commit();
        } catch (Exception $exception) {
            Log::info($exception);
            DB::rollBack();
        }
    }
}
