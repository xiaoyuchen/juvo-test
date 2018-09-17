# A coding test project from JUVO

## Prerequisites

<ul>
<li>After cloning this repository, go to the root folder, run the following command/s,
<pre>
    composer install
    composer update</pre>
</li>
    <li>Rename .env.example to .env and provide your database details there.</li>
    <li>Generate key by running <code>php artisan key:generate</code> and copy the key to <code>APP_KEY</code> in your .env file</li>
    <li>Setup database by running <code>php artisan migrate</code></li>
    <li>Setup cron job by adding <code>* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1</code> to crontab</li>
    <li>If the cron job setup correctly, the database should be populate with albums and photos every 5 mininuts. Otherwise, you can use <code>php artisan load:album</code>to manually load the album data.</li>
</ul>

## Issues
If you get exception <code>SQLSTATE[HY000] [1045] Access denied for user 'forge'@'localhost' (using password: NO)</code>

reason might be: 
<ul>
    <li>you have not set the database parameters correctly in .env file </li>
    <li>you need clear the cache by runing <code>php artisan config:clear</code> </li>
</ul>

If you get <code>Failed to clear cache. Make sure you have the appropriate permissions.</code>

reason might be: 
<ul>
    <li>you need create <code>storage/framework/cache/data</code> folder </li>
</ul>

## Working Demo
You can see the demo of the project <a href="http://www.orientalpantry.ie/juvo/juvo-test-project/public/albumlist">here</a>
