function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");

  if (sidebar.style.display === "none") {
    sidebar.style.display = "block";
    sidebar.style.zIndex = "4000";
  } else {
    sidebar.style.display = "none";
  }
}
