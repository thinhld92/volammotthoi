

document.addEventListener('DOMContentLoaded', function(){
  const menuList = document.querySelectorAll('.nk-navbar .nk-nav-table > .nk-nav.nk-nav-web > li > a');
  if (menuList.length > 0) {
    for (let index = 0; index < menuList.length; index++) {
      const menuItem = menuList[index];
      const menuText = menuList[index].textContent.trim();
      // console.log(menuText);
      let lineBreakText = menuText.replace(/^((\S+\s+){1}\S+)\s+/, '$1<br>');
      // console.log(lineBreakText);
      menuItem.innerHTML = lineBreakText;
    }
  }
})