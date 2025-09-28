<?php
session_start();

/* Initial data if not exists */
if (!isset($_SESSION['works'])) {
  $_SESSION['works'] = [
    "Other"   => [
      ["title"=>"Other","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>null],
      ["title"=>"Other","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>null],
      ["title"=>"Other","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>null],
    ],
    "Articles" => [
      ["title"=>"Article","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>null],
      ["title"=>"Article","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>null],
      ["title"=>"Article","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>null],
    ],
    "Journals" => [
      ["title"=>"Thai Language and Literature Journal","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>"Year of publication"],
      ["title"=>"Arts Journal","by"=>"Published by Academic Dissemination Project, Faculty of Arts","year"=>"Year of publication"],
      ["title"=>"Thai Language and Literature Journal","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>"Year of publication"],
    ],
    "Textbooks"   => [
      ["title"=>"Textbook","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>"Year of publication"],
      ["title"=>"Textbook","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>"Year of publication"],
      ["title"=>"Textbook","by"=>"Prepared by Department of Thai Language and Faculty of Arts","year"=>"Year of publication"],
    ],
  ];
}

$works = $_SESSION['works'];
$tab = $_GET['tab'] ?? 'Other';
if (!isset($works[$tab])) $tab = 'Other';

$breadcrumbs = [
  "Other"   => "Other / Lecturers",
  "Articles"=> "Articles / Lecturers",
  "Journals"=> "Journals / Lecturers",
  "Textbooks"=> "Textbooks / Lecturers",
];
$currentBreadcrumb = $breadcrumbs[$tab];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Work Management</title>
<style>
/* ใช้ CSS จากเวอร์ชันก่อน (breadcrumb, nav, hero, list, badge) */
body{font-family:"Noto Sans Thai","Segoe UI",Tahoma,Arial,sans-serif;background:#eee;margin:0}
.wrap{max-width:1150px;margin:0 auto;}
.topbar{background:#fff;border-bottom:1px solid #d8d8d8}
.topbar .row{display:flex;align-items:center;padding:10px 18px}
.crumb-left{color:#b8b8b8;font-weight:700}
.spacer{flex:1}
.auth{font-size:14px;color:#666}
.auth a{color:#666}
.hero{margin:16px;border:1px solid #a9c7f1;background:#b9d6ff}
.hero h1{margin:0;padding:42px 0;text-align:center;font-weight:900;font-size:56px;color:#26364b}
.list{background:#fff;margin:0 16px 24px;padding:6px 10px}
.item{display:flex;gap:16px;align-items:flex-start;padding:14px 8px}
.thumb{width:78px;height:78px;border:1px solid #d6d6d6;background:#f7f7f7}
.meta{flex:1}
.title{font-weight:800;margin:0 0 6px}
.pill{display:inline-block;padding:4px 10px;border:1px solid #ccc;border-radius:8px;background:#f5f5f5;font-size:12px}
.footer-switch{margin:0 16px 30px;color:#777;font-size:14px}
.footer-switch a{text-decoration:underline;margin-right:10px}
</style>
</head>
<body>
<div class="wrap">

  <!-- Top breadcrumb -->
  <div class="topbar">
    <div class="row">
      <div class="crumb-left"><?= htmlspecialchars($currentBreadcrumb) ?></div>
      <div class="spacer"></div>
      <div class="auth"><a href="#">Register</a> | <a href="#">Login</a></div>
    </div>
  </div>

  <!-- Hero -->
  <div class="hero"><h1>Works</h1></div>

  <!-- List -->
  <div class="list">
    <?php foreach($works[$tab] as $i=>$row): ?>
      <div class="item">
        <div class="thumb"></div>
        <div class="meta">
          <p class="title">Example: <?= htmlspecialchars($row['title']) ?></p>
          <div class="badges">
            <a class="pill" href="edit_data.php?tab=<?= urlencode($tab) ?>&idx=<?= $i ?>">Edit</a>
          </div>
          <p class="by"><?= htmlspecialchars($row['by']) ?></p>
          <?php if(!empty($row['year'])): ?>
            <p class="year"><?= htmlspecialchars($row['year']) ?></p>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Switch tab -->
  <div class="footer-switch">
    Switch Tab:
    <?php foreach(array_keys($works) as $name): ?>
      <a href="?tab=<?= urlencode($name) ?>"><?= htmlspecialchars($name) ?></a>
    <?php endforeach; ?>
  </div>

</div>
</body>
</html>
