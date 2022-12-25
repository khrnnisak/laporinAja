<?php

namespace Tests\Unit;

use App\Models\Laporan;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Storage;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_login_functional()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_register_functionally()
    {
        $response = $this->post('/register', [
            'username' => 'Afina',
            'name' => 'afnAfina',
            'email' => 'afina@gmail.com',
            'password' => 'afina4567',
            'password_confirmation' => 'afina4567',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_login_functionally()
    {
        $user = User::factory()->create([
            'username' => 'Affan',
            'name' => 'affanna',
            'email' => 'affana@gmail.com',
            'password' => bcrypt('affana9090'),
        ]);

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'affana9090'
        ]);
        $response->assertValid();
        $this->assertAuthenticated();
        $response->assertRedirect('user');
    }

    // public function test_send_report_functionally()
    // {
    //     $user =  new User([
    //         'username' => 'Affin',
    //         'name' => 'afinna',
    //         'email' => 'affinna@gmail.com',
    //         'password' => 'affinna9090',
    //     ]);

    //     $user->save();

    //     Storage::fake('public');
    //     $file = UploadedFile::fake()->image('image.jpg');
    //     $data = [
    //         'kategori' => 'Aspirasi',
    //         'isi' => 'Minta tolong dibenerin ya, acnya bocor',
    //         'foto' => $file,
    //         'is_hidden' => 1,
    //         'user_id' => $user->id,
    //     ];
    //     $laporan = new Laporan(
    //         $data
    //     );

    //     $laporan->save();
    //     $this->assertDatabaseHas('laporan', $data);
    // }
}
