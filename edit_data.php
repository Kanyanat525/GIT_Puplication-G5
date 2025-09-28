<?php
session_start();
if (!isset($_SESSION['works'])) { header("Location: edit.php"); exit; }

$tab = $_GET['tab'] ?? 'Other';
$idx = isset($_GET['idx']) ? intval($_GET['idx']) : 0;
if (!isset($_SESSION['works'][$tab][$idx])) { header("Location: edit.php?tab=".urlencode($tab)); exit; }

$item = $_SESSION['works'][$tab][$idx];

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $_SESSION['works'][$tab][$idx]['title'] = trim($_POST['title'] ?? $item['title']);
  $_SESSION['works'][$tab][$idx]['by']    = trim($_POST['by'] ?? $item['by']);
  $year = trim($_POST['year'] ?? '');
  $_SESSION['works'][$tab][$idx]['year']  = ($year === '') ? null : $year;
  header("Location: edit.php?tab=".urlencode($tab));
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Work</title>
<style>
body{font-family:"Noto Sans Thai","Segoe UI",Tahoma,Arial,sans-serif;background:#eee;margin:0}
.wrap{max-width:780px;margin:26px auto;background:#fff;border:1px solid #ddd;border-radius:8px}
.head{padding:14px 18px;border-bottom:1px solid #e4e4e4;font-weight:800}
form{padding:18px}
label{display:block;margin:10px 0 6px;font-weight:700}
input[type="text"]{width:100%;height:38px;border:1px solid #cfcfcf;border-radius:8px;padding:0 12px;outline:none}
.actions{display:flex;gap:10px;margin-top:18px}
.btn{padding:10px 16px;border:1px solid #cfcfcf;border-radius:10px;background:#f5f5f5;cursor:pointer}
.primary{background:#2d6cdf;color:#fff;border-color:#2d6cdf}
</style>
</head>
<body>
<div class="wrap">
  <div class="head">Edit Work in “<?= htmlspecialchars($tab) ?>”</div>
  <form method="post">
    <label>Title</label>
    <input type="text" name="title" value="<?= htmlspecialchars($item['title']) ?>" required>

    <label>Prepared by</label>
    <input type="text" name="by" value="<?= htmlspecialchars($item['by']) ?>" required>

    <label>Year (optional)</label>
    <input type="text" name="year" value="<?= htmlspecialchars($item['year'] ?? '') ?>">

    <div class="actions">
      <button class="btn primary" type="submit">Save</button>
      <a class="btn" href="edit.php?tab=<?= urlencode($tab) ?>">Cancel</a>
    </div>
  </form>
</div>
</body>
</html>
