// 탭메뉴

var tabMenu = $(".notice");

tabMenu.find("ul > li > ul").hide();
tabMenu.find("ul > li.active > ul").show();

function tabList(e){
    e.preventDefault();
    var target = $(this);
};
tabList();

tabMenu.find("ul > li > a").click(tabList);