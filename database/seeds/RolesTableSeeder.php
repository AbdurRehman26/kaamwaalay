<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = Carbon::now();        
        Role::insertOnDuplicateKey(array ( 
            array (
                'id' => 1,
                'title' => 'Admin',
                'can_register' => 0,
                'scope' => json_encode([
                    "user.index",
                    "service.index",
                    "change.status",
                    "user.store",
                    "user.show",
                    "change.access_level",
                    "job.index",
                    "job.show",
                    "job.update",
                    "job-bid.index",
                    "job-bid.update",
                    "service.store",
                    "service.show",
                    "service.update",
                    "service-provider-profile.index",
                    "service-provider-profile.show",
                    "service-provider-profile-request.index",
                    "service-provider-profile-request.show",
                    "service-provider-profile-request.update",
                    "campaign.index",
                    "campaign.show",
                    "dashboard",
                    "file.upload",
                    "file.remove",
                    "plan.index",
                    "plan.show",
                    "plan.update",
                    "role.index",
                    "role.show",
                    "state.index",
                    "state.show",
                    "city.index",
                    "city.show",
                    "country.index",
                    "country.show",
                    "user-rating.index",
                    "user-rating.show",
                    "support-inquiry.index",
                    'support-inquiry.update',
                    "support-question.index",
                    "plan.update.or.add",
                    "payment.index",
                ]),
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 2,
                'title' => 'Service Provider',
                'can_register' => 1,
                'scope' =>json_encode([
                    "campaign.index",
                    "campaign.store",
                    "campaign.show",
                    "user-rating.store",
                    "plan.index",
                    "support-inquiry.store",
                ]), 
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 3,
                'title' => 'Customer',
                'can_register' => 1,
                'scope' =>json_encode([
                    "user.me",
                    "user.store",
                    "user.update",
                    "job.index",
                    "job.show",
                    "job.store",
                    "job.update",
                    "file.upload",
                    "file.remove",
                    "job.stats",
                    "job-bid.store",
                    "job-bid.update",
                    "update.campaign",
                    "user-rating.store",
                    "support-inquiry.store",
                ]), 
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 4,
                'title' => 'Reviewer',
                'can_register' => 0,
                'scope' => json_encode([
                    "user.index",
                    "service.index",
                    "service.show",
                    "service-provider-profile.index",
                    "service-provider-profile-request.index",
                    "service-provider-profile-request.show",
                    "service-provider-profile-request.update",
                ]),
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
        ));
    }
}
