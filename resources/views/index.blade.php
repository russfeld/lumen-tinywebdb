<html>
<body>

<h1>Lumen Tiny Web DB</h1>

<p>This website was designed to work with MIT's <a href="http://appinventor.mit.edu/explore/">App Inventor</a> tool to allow mobile applications to store data to the cloud</p>

<p>For more information about using TinyWebDB in App Inventor visit <a href="http://www.appinventor.org/Databases2">Appinventor.org</a></p>

<p>To use this website, first email Russ Feldhausen (russfeld AT ksu DOT edu |OR| russfeldh AT gmail DOT com) to request a unique key for your application or class. I recommend that you request a unique key for each application or group that will be using the website in to prevent data collisions. Basically, if two applications using the same key also use the same tag when storing their data, they will end up overwriting each other's data. It is very simple to create multiple keys, so don't feel limited to a single key</p>

<p>Once you have your key, you can visit <b>https://tinywebdb.russfeld.me/&lt;key&gt;</b> to view the data stored under that key for debugging purposes. For example, if the key you received is "abc123", then you'll visit <b>https://tinywebdb.russfeld.me/abc123</b> to view your data. The data will be returned in a standard JSON format, which most browsers can read natively. I recommend using <a href="https://www.mozilla.org/en-US/firefox/">Mozilla Firefox</a> for this, as it parses the JSON into a much more readable format.</p>

<p>To use the service, simply enter <b>https://tinywebdb.russfeld.me/&lt;key&gt;</b> as the ServiceURL for your TinyWebDB component in your application. For example, if the key you received is "abc123", then you'll use <b>https://tinywebdb.russfeld.me/abc123</b> as your ServiceURL. See the image below for more details. Once you've used your application to store and receive data, you can visit that URL in a browser to see your data.</p>

<img src="/images/tinywebdb.png">

<p>You can also download the <a href="/files/TestApp1.aia">Test Application<a> to test this service in <a href="http://appinventor.mit.edu/explore/">App Inventor.</a><p>

<p>If you have any issues working with this service, need to request additional keys, or would like to have your data cleared at the end of the semester, please contact Russ Feldhausen (russfeld AT ksu DOT edu |OR| russfeldh AT gmail DOT com) for assistance.</p>

<p>The code for this service is available on <a href="https://github.com/russfeld/lumen-tinywebdb">GitHub</a> if you'd like to host it yourself. It was built using <a href="https://lumen.laravel.com/">Laravel Lumen</a> and can easily be deployed on any LAMP server. See the readme file on GitHub for details.<p>

</body>
</html>
