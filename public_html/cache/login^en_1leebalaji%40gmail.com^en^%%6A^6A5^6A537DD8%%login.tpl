233
a:4:{s:8:"template";a:5:{s:9:"login.tpl";b:1;s:12:"html.inc.tpl";b:1;s:15:"toolbar.inc.tpl";b:1;s:14:"header.inc.tpl";b:1;s:14:"footer.inc.tpl";b:1;}s:9:"timestamp";i:1458457434;s:7:"expires";i:1458461034;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="http://localhost/gp/public_html/style.css" />
  <link rel="alternate" type="application/rss+xml" title= "Latest Pixels" href="http://localhost/gp/public_html/rss_latest_pixels.php" />
  <link rel="alternate" type="application/rss+xml" title= "Top Pixels" href="http://localhost/gp/public_html/rss_top_pixels.php" />
  <link rel="alternate" type="application/rss+xml" title= "Blog Articles" href="http://localhost/gp/public_html/rss_blog_articles.php" />
  <title>MD - Login</title>

  <!-- drawing module dependencies -->
   <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<div class="toolbar">
  <table width="100%">
    <tr>
      <td>
        <a href="http://localhost/gp/public_html/index.php">Home</a>
        &nbsp;&nbsp;
        <a href="http://localhost/gp/public_html/get_pixels.php">Become Sponsor</a>
        &nbsp;&nbsp;
        <a href="http://localhost/gp/public_html/drawings.php">Drawings</a>
         
      </td>
      <td align="right">
                              Welcome, <strong>balaji balaji</strong>
            &nbsp;&nbsp;
            <a href="http://localhost/gp/public_html/account.php">Your Account</a>
            &nbsp;&nbsp;
            <a href="http://localhost/gp/public_html/logout.php">Log Out</a>
            &nbsp;&nbsp;
                          
      </td>
    </tr>
  </table>
</div>

<h1>Login</h1>



<p>Don't have an account? <a href="http://localhost/gp/public_html/signup.php">Sign Up Now</a>.</p>


<form method="post" action="/gp/public_html/login.php">
<table>

  <tr>
    <td class="label">Enter your E-Mail Address:</td>
    <td><input name="email" size="80" value="leebalaji@gmail.com" /></td>
  </tr>

  <tr>
    <td class="label">Password:</td>
    <td><input type="password" name="pass" size="20" /> <a href="http://localhost/gp/public_html/retrieve_password.php">Forgot your Password?</a></td>
  </tr>

</table>
<p>
  <input type="submit" value="Log In" />
</p>
</form>

    </div>
  </body>
</html>