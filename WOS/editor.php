<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">
function openPage(evt, page) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("editor_tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("editor_tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(page).style.display = "block";
    evt.currentTarget.className += " active";
}
//document.getElementById("defaultOpen").click();
</script>
</head>
<body>
<div class="editor_Ekran">
<div class="editor_Onizleme">
Önizleme
</div>
<div class="editor_TapContent">

<div class="editor_tab">
  <button class="editor_tablinks" onclick="openPage(event, 'Ayar')" id="defaultOpen">Ayarlar</button>
  <button class="editor_tablinks" onclick="openPage(event, 'Kompanent')">Kompanentler</button>
</div>

<div id="Ayar" class="editor_tabcontent">
  <h3>Ayarlar</h3>
</div>

<div id="Kompanent" class="editor_tabcontent">
  <h3>Kompanent</h3>
</div>

</div>
</div>
</body>
</html>