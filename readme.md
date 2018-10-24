<h1>Lumen Tiny Web DB</h1>

<p>This website was designed to work with MIT's <a href="http://appinventor.mit.edu/explore/">App Inventor</a> tool to allow mobile applications to store data to the cloud</p>

<p>To use this website, first email Russ Feldhausen (russfeld AT ksu DOT edu |OR| russfeldh AT gmail DOT com) to request a unique key for your application or class. I recommend that you request a unique key for each application or group that will be using the website in to prevent data collisions. Basically, if two applications using the same key also use the same tag when storing their data, they will end up overwriting each other's data. It is very simple to create multiple keys, so don't feel limited to a single key</p>

<p>Once you have your key, you can visit <b>https://tinywebdb.russfeld.me/&lt;key&gt;</b> to view the data stored under that key for debugging purposes. For example, if the key you received is "abc123", then you'll visit <b>https://tinywebdb.russfeld.me/abc123</b> to view your data. The data will be returned in a standard JSON format, which most browsers can read natively. I recommend using <a href="https://www.mozilla.org/en-US/firefox/">Mozilla Firefox</a> for this, as it parses the JSON into a much more readable format.</p>

<p>To use the service, simply enter <b>https://tinywebdb.russfeld.me/&lt;key&gt;</b> as the ServiceURL for your TinyWebDB component in your application. For example, if the key you received is "abc123", then you'll use <b>https://tinywebdb.russfeld.me/abc123</b> as your ServiceURL. See the image below for more details. Once you've used your application to store and receive data, you can visit that URL in a browser to see your data.</p>

<a href="https://tinywebdb.russfeld.me/images/tinywebdb.png">Image</a>

<p>You can also download the <a href="/files/TestApp1.aia">Test Application<a> to test this service in <a href="http://appinventor.mit.edu/explore/">App Inventor</a><p>

<p>If you have any issues working with this service, need to request additional keys, or would like to have your data cleared at the end of the semester, please contact Russ Feldhausen (russfeld AT ksu DOT edu |OR| russfeldh AT gmail DOT com) for assistance.</p>

<p>The code for this service is available on <a href="https://github.com/russfeld/lumen-tinywebdb">GitHub</a> if you'd like to host it yourself. It was built using <a href="https://lumen.laravel.com/">Laravel Lumen</a> and can easily be deployed on any LAMP server.<p>

<h3>Developer Notes</h3>

To deploy this application:

<ol>
  <li>Install <a href="https://getcomposer.org/">Composer</a></li>
  <li>Verify your server meets the <a href="https://lumen.laravel.com/docs/5.5">Lumen 5.5 Installation Requirements</a></li>
  <li>Clone this project from <a href="https://github.com/russfeld/lumen-tinywebdb">GitHub</a></li>
  <li>Create a MySQL database and user for this project</li>
  <li>Copy .env.example to .env</li>
  <li>Edit the database configuration settings in .env</li>
  <li>Provide an APP_KEY in .env (<a href="https://lumen.laravel.com/docs/5.7">Lumen Documentation</a>)</li>
  <li>Provide an ADMIN_KEY in .env that allows you to access the Admin interface. This key should not be used as a key elsewhere in the application</li>
  <li>In the root directory of this project, run `composer install` to install PHP dependencies</li>
  <li>In the root directory of this project, run `php artisan migrate` to create the required database tables</li>
  <li>In the root directory of this project, ensure the 'storage' folder and all its contents are writable by the web server</li>
  <li>Copy tinywebdb.conf to your Apache sites directory and edit as needed</li>
  <li>Enable the site and restart Apache</li>
</ol>

<h3>Admin Interface</h3>

<ul>
  <li>To view all data, visit &lt;URL&gt;/&lt;ADMIN_KEY&gt;</li>
  <li>To add a key, visit &lt;URL&gt;/&lt;ADMIN_KEY&gt;/new?key=&lt;key&gt;</li>
  <li>To delete a key and all associated data, visit &lt;URL&gt;/&lt;ADMIN_KEY&gt;/delete?key=&lt;key&gt;</li>
  <li>To test storing data, visit &lt;URL&gt;/&lt;key&gt;/storeavalue?tag=&lt;tag&gt;&amp;value=&lt;value&gt;</li>
  <li>To test reading data, visit &lt;URL&gt;/&lt;key&gt;/getvalue?tag=&lt;tag&gt;</li>
</ul>

</body>
</html>
