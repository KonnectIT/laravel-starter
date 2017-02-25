@servers(['web' => 'user@192.168.1.1', 'localhost' => '127.0.0.1'])

@setup
    function env(string $key) {
        $dotenv = file_get_contents('.env');
        $rows   = explode("\n", $dotenv);

        $search = array_filter($rows, function ($row) use ($key) {
            if (strstr($row, $key)) {
                return $row;
            }
        });

        $variable = reset($search);
        $segments = explode('=', $variable);
        $user = end($segments);

        return $user;
    }

    # Set Slack webhook URL
    $slackWebhookUrl = env('SLACK_WEBHOOK_URL');
@endsetup

@finished
    # @slack($slackWebhookUrl, '@e.heij')
@endfinished

@story('deploy', ['on' => ['localhost']])
    git
    composer
@endstory

@task('git')
    echo git
    # git pull origin master
@endtask

@task('composer')
    echo composer
    # composer install
@endtask

@task('foo', ['on' => 'localhost'])
    ls -la
@endtask
