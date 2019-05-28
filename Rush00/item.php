<?php
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
session_start();
$handle = fopen("catalog.csv", "r");
if (flock($handle, LOCK_SH))
{
    while (!feof($handle))
    {
        $data = fgetcsv($handle, 0, ";");
        if ($data[0] == $_GET['ref'])
            break;
        else
            unset($data);
    }
}
fclose($handle);
if (!isset($data))
{
    $_SESSION['error_msg'][] = "Votre produit n'existe pas.\n";
    header('Location: /Rush0');
    exit;
}
?>
<html>
<head>
    <title>YAUQ - <?php echo $_GET['category'];?></title>
    <link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
    <body>
        <?php include $root.'/header.php'; ?>
        <?php include $root.'/nav_bar.php'; ?>
        <div id='content_item'>
            <h1><?php echo "$data[1]";?></h1>
            <img src='/Rush0/images/catalog/<?php echo $data[3];?>'>
            <br />
            <h4 align="left"><?php echo "$data[2]"?></h4>
        </div>
    </body>
</html>
