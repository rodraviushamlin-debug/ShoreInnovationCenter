<?php
// Default page title
if (!isset($pageTitle)) {
    $pageTitle = "Robin and Doug Shore Innovation Center";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Student project website for the Robin and Doug Shore Innovation Center."
    >

    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header id="site-header">

    <a
        href="https://www.kennesaw.edu/ccse/"
        target="_blank"
        rel="noopener noreferrer"
    >
        <img
            src="img/ksu-logo.png"
            alt="Kennesaw State University Logo"
        >
    </a>

    <h1>Robin and Doug Shore Innovation Center</h1>

</header>