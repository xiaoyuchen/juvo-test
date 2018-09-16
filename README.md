# A coding test project from JUVO

## Prerequisites

<ul>
<li>After cloning this repository, go to the root folder, run the following command/s,
<pre>
    composer install
    composer update</pre>
</li>
<li>Rename .env.example to .env and provide your database details there.</li>
<li>Generate key by running <code>php artisan key:generate</code></li>
<li>Setup database by running <code>php artisan migrate</code></li>
<li>Setup cron job by adding <code>* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1</code> to crontab</li>
</ul>

## Working Demo
You can see the demo of the project <a href="http://www.orientalpantry.ie/juvo/juvo-test-project/public/albumlist">here</a>
