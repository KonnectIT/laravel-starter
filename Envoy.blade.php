@setup
require __DIR__.'/vendor/autoload.php';
(new \Dotenv\Dotenv(__DIR__, '.env'))->load();

// server-naam zelfde naam geven als (git/bitbucket) repo-naam

$server = "testrepo";
$repository = "spatie/{$server}";
$baseDir = "/home/forge/{$server}";
$releasesDir = "{$baseDir}/releases";
$currentDir = "{$baseDir}/current";
$newReleaseName = date('Ymd-His');
$newReleaseDir = "{$releasesDir}/{$newReleaseName}";
$user = get_current_user();

function logMessage($message) {
return "echo '\033[32m" .$message. "\033[0m';\n";
}

@endsetup

@servers(['web' => 'user@192.168.1.1', 'localhost' => '127.0.0.1'])

@finished
    @slack(env('SLACK_WEBHOOK_URL'), '#deployments', "{$server}: {$baseDir} release {$newReleaseName} by {$user}: {$task} done")
@endfinished

@story('deploy', ['on' => ['localhost']])
    git
    runComposer
@endstory

@task('git')
    {{ logMessage('git'); }}
    # git pull origin master
@endtask

@task('runComposer', ['on' => 'localhost'])
{{ logMessage("\u{1F69A}  Running Composer...") }}
# cd {{ $newReleaseDir }};
# composer install --prefer-dist --no-scripts --no-dev -q -o;
@endtask

@task('foo', ['on' => 'localhost'])
    ls -la
@endtask
