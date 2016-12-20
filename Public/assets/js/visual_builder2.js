!function(a){a.fn.gridEditor=function(b){var c=this,d=c.data("grideditor");if("getHtml"==arguments[0]){if(d){d.deinit();var e=c.html();return d.init(),e}return c.html()}return c.each(function(d,e){function f(){if(D=e.addClass("ge-canvas"),H.source_textarea){var b=a(H.source_textarea);b.addClass("ge-html-output"),G=b,b.val()&&c.html(b.val())}"undefined"!=typeof G&&G.length||(G=a('<textarea class="ge-html-output"/>').insertBefore(D)),E=a('<div class="ge-mainControls" />').insertBefore(G);var d=a('<div class="ge-wrapper ge-top" />').appendTo(E);F=a('<div class="ge-addRowGroup btn-group" />').appendTo(d),a.each(H.new_row_layouts,function(b,c){var d=a('<a class="btn btn-xs btn-primary" />').attr("title","Add row "+c.join("-")).on("click",function(){var a=s().appendTo(D);c.forEach(function(b){t(b).appendTo(a)}),g()}).appendTo(F);d.append('<span class="glyphicon glyphicon-plus-sign"/>');var e=(c.join(" - "),'<div class="row ge-row-icon">');c.forEach(function(a){e+='<div class="column col-xs-'+a+'"/>'}),e+="</div>",d.append(e)});var f=a('<div class="dropdown pull-right ge-layout-mode"><button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown"><span>Desktop</span></button><ul class="dropdown-menu" role="menu"><li><a data-width="auto" title="Desktop"><span>Desktop</span></a></li><li><a title="Tablet"><span>Tablet</span></li><li><a title="Phone"><span>Phone</span></a></li></ul></div>').on("click","a",function(){var b=a(this);y(b.closest("li").index());var c=f.find("button");c.find("span").remove(),c.append(b.find("span").clone())}).appendTo(d),i=a('<div class="btn-group pull-right"/>').appendTo(d),j=a('<button title="Edit Source Code" type="button" class="btn btn-xs btn-primary gm-edit-mode"><span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-chevron-right"></span></button>').on("click",function(){j.hasClass("active")?(D.empty().html(G.val()).show(),g(),G.hide()):(h(),G.height(.8*a(window).height()).val(D.html()).show(),D.hide()),j.toggleClass("active btn-danger")}).appendTo(i),k=a('<button title="Preview" type="button" class="btn btn-xs btn-primary gm-preview"><span class="glyphicon glyphicon-eye-open"></span></button>').on("mouseenter",function(){D.removeClass("ge-editing")}).on("click",function(){k.toggleClass("active btn-danger").trigger("mouseleave")}).on("mouseleave",function(){k.hasClass("active")||D.addClass("ge-editing")}).appendTo(i),l=a(window);l.on("scroll",function(a){l.scrollTop()>E.offset().top&&l.scrollTop()<D.offset().top+D.height()?d.hasClass("ge-top")&&d.css({left:d.offset().left,width:d.outerWidth()}).removeClass("ge-top").addClass("ge-fixed"):d.hasClass("ge-fixed")&&d.css({left:"",width:""}).removeClass("ge-fixed").addClass("ge-top")}),D.on("click",".ge-content",function(b){var c=z(a(this).data("ge-content-type"));c&&c.init(H,a(this))})}function g(){u(!0),D.addClass("ge-editing"),m(),v(),i(),j(),q(),y(J)}function h(){D.removeClass("ge-editing");D.find(".ge-content").each(function(){var b=a(this);z(b.data("ge-content-type")).deinit(H,b)});D.find(".ge-tools-drawer").remove(),r(),u()}function i(){D.find(".row").each(function(){var b=a(this);if(!b.find("> .ge-tools-drawer").length){var c=a('<div class="ge-tools-drawer" />').prependTo(b);k(c,"Move","ge-move","glyphicon-move"),k(c,"Settings","","glyphicon-cog",function(){d.toggle()}),H.row_tools.forEach(function(a){k(c,a.title||"",a.className||"",a.iconClass||"glyphicon-wrench",a.on)}),k(c,"Remove row","","glyphicon-trash",function(){b.slideUp(function(){b.remove()})}),k(c,"Add column","ge-add-column","glyphicon-plus-sign",function(){b.append(t(3)),g()});var d=l(b,H.row_classes).appendTo(c)}})}function j(){D.find(".column").each(function(){var b=a(this);if(!b.find("> .ge-tools-drawer").length){var c=a('<div class="ge-tools-drawer" />').prependTo(b);k(c,"Move","ge-move","glyphicon-move"),k(c,"Make column narrower\n(hold shift for min)","ge-decrease-col-width","glyphicon-minus",function(a){var c=H.valid_col_sizes,d=I[J],e=c.indexOf(n(b,d)),f=c[A(e-1,0,c.length-1)];a.shiftKey&&(f=c[0]),p(b,d,Math.max(f,1))}),k(c,"Make column wider\n(hold shift for max)","ge-increase-col-width","glyphicon-plus",function(a){var c=H.valid_col_sizes,d=I[J],e=c.indexOf(n(b,d)),f=A(e+1,0,c.length-1),g=c[f];a.shiftKey&&(g=c[c.length-1]),p(b,d,Math.min(g,K))}),k(c,"Settings","","glyphicon-cog",function(){d.toggle()}),H.col_tools.forEach(function(a){k(c,a.title||"",a.className||"",a.iconClass||"glyphicon-wrench",a.on)}),k(c,"Remove col","","glyphicon-trash",function(){b.animate({opacity:"hide",width:"hide",height:"hide"},400,function(){b.remove()})}),k(c,"Add row","ge-add-row","glyphicon-plus-sign",function(){var a=s();b.append(a),a.append(t(6)).append(t(6)),g()});var d=l(b,H.col_classes).appendTo(c)}})}function k(b,c,d,e,f){var g=a('<a title="'+c+'" class="'+d+'"><span class="glyphicon '+e+'"></span></a>').appendTo(b);"function"==typeof f&&g.on("click",f),"object"==typeof f&&a.each(f,function(a,b){g.on(a,b)})}function l(b,c){var d=a('<div class="ge-details" />');a('<input class="ge-id" />').attr("placeholder","id").val(b.attr("id")).attr("title","Set a unique identifier").appendTo(d);var e=a('<div class="btn-group" />').appendTo(d);return c.forEach(function(c){var d=a('<a class="btn btn-xs btn-default" />').html(c.label).attr("title",c.title?c.title:'Toggle "'+c.label+'" styling').toggleClass("active btn-primary",b.hasClass(c.cssClass)).on("click",function(){d.toggleClass("active btn-primary"),b.toggleClass(c.cssClass,d.hasClass("active"))}).appendTo(e)}),d}function m(){D.find('.column, div[class*="col-"]').each(function(){var b=a(this),c=2,d=o(b);d.length&&(c=d[0].size);var e=b.attr("class");I.forEach(function(a){-1==e.indexOf(a)&&b.addClass(a+c)}),b.addClass("column")})}function n(a,b){for(var c=o(a),d=0;d<c.length;d++)if(c[d].colClass==b)return c[d].size;return c.length?c[0].size:null}function o(a){var b=[];return I.forEach(function(c){var d=new RegExp(c+"(\\d+)","i");d.test(a.attr("class"))&&b.push({colClass:c,size:parseInt(d.exec(a.attr("class"))[1])})}),b}function p(a,b,c){var d=new RegExp("("+b+"(\\d+))","i"),e=d.exec(a.attr("class"));e&&parseInt(e[2])!==c?a.switchClass(e[1],b+c,50):a.addClass(b+c)}function q(){function a(a,b){b.placeholder.css({height:b.item.outerHeight()})}D.find(".row").sortable({items:"> .column",connectWith:".ge-canvas .row",handle:"> .ge-tools-drawer .ge-move",start:a,helper:"clone"}),D.add(D.find(".column")).sortable({items:"> .row, > .ge-content",connectsWith:".ge-canvas, .ge-canvas .column",handle:"> .ge-tools-drawer .ge-move",start:a,helper:"clone"})}function r(){D.add(D.find(".column")).add(D.find(".row")).sortable("destroy")}function s(){return a('<div class="row" />')}function t(b){return a("<div/>").addClass(I.map(function(a){return a+b}).join(" ")).append(x().html(z(H.content_types[0]).initialContent))}function u(b){H.custom_filter.length&&a.each(H.custom_filter,function(a,c){"string"==typeof c&&(c=window[c]),c(D,b)})}function v(){D.find(".column").each(function(){var b=a(this),c=a();b.children().each(function(){var b=a(this);b.is(".row, .ge-tools-drawer, .ge-content")?w(c):c=c.add(b)}),w(c)})}function w(b){if(b.length){var c=x().insertAfter(b.last());b.appendTo(c),b=a()}}function x(){return a("<div/>").addClass("ge-content ge-content-type-"+H.content_types[0]).attr("data-ge-content-type",H.content_types[0])}function y(a){J=a;var b=["ge-layout-desktop","ge-layout-tablet","ge-layout-phone"];b.forEach(function(b,c){D.toggleClass(b,c==a)})}function z(b){return a.fn.gridEditor.RTEs[b]}function A(a,b,c){return Math.min(c,Math.max(b,a))}if(e=a(e),e.children().length&&!e.find("div.row").length){var B=e.children(),C=a('<div class="row"><div class="col-md-12"/></div>').appendTo(e);C.find(".col-md-12").append(B)}var D,E,F,G,H=a.extend({new_row_layouts:[[12],[6,6],[4,4,4],[3,3,3,3],[2,2,2,2,2,2],[2,8,2],[4,8],[8,4]],row_classes:[{label:"Example class",cssClass:"example-class"}],col_classes:[{label:"Example class",cssClass:"example-class"}],col_tools:[],row_tools:[],custom_filter:"",content_types:["tinymce"],valid_col_sizes:[1,2,3,4,5,6,7,8,9,10,11,12],source_textarea:""},b),I=["col-md-","col-sm-","col-xs-"],J=0,K=12;f(),g(),e.data("grideditor",{init:g,deinit:h})}),c},a.fn.gridEditor.RTEs={}}(jQuery),function(){$.fn.gridEditor.RTEs.ckeditor={init:function(a,b){window.CKEDITOR||console.error("CKEditor not available! Make sure you loaded the ckeditor and jquery adapter js files.");var c=this;b.each(function(){var b=$(this);if(!b.hasClass("active")){b.html()==c.initialContent&&b.html("&nbsp;"),b.addClass("active").attr("contenteditable","true");var d=$.extend(a.ckeditor&&a.ckeditor.config?a.ckeditor.config:{},{on:{instanceReady:function(a){e.focus()}}}),e=CKEDITOR.inline(b.get(0),d)}})},deinit:function(a,b){b.filter(".active").each(function(){var a=$(this);$.each(CKEDITOR.instances,function(a,b){b.destroy()}),a.removeClass("active cke_focus").removeAttr("id").removeAttr("style").removeAttr("spellcheck").removeAttr("contenteditable")})},initialContent:"<p>Lorem initius... </p>"}}(),function(){$.fn.gridEditor.RTEs.summernote={init:function(a,b){jQuery().summernote||console.error("Summernote not available! Make sure you loaded the Summernote js file.");var c=this;b.each(function(){var b=$(this);if(!b.hasClass("active")){b.html()==c.initialContent&&b.html(""),b.addClass("active");var d=$.extend(a.summernote&&a.summernote.config?a.summernote.config:{},{tabsize:2,airMode:!0,callbacks:{onInit:function(){try{a.summernote.config.callbacks.onInit.call(this)}catch(c){}b.summernote("focus")}}});b.summernote(d)}})},deinit:function(a,b){b.filter(".active").each(function(){var a=$(this);a.summernote("destroy"),a.removeClass("active").removeAttr("id").removeAttr("style").removeAttr("spellcheck")})},initialContent:"<p>Lorem ipsum dolores</p>"}}(),function(){$.fn.gridEditor.RTEs.tinymce={init:function(a,b){window.tinymce||console.error("tinyMCE not available! Make sure you loaded the tinyMCE js file."),b.tinymce||console.error("tinyMCE jquery integration not available! Make sure you loaded the jquery integration plugin.");var c=this;b.each(function(){var b=$(this);if(!b.hasClass("active")){b.html()==c.initialContent&&b.html(""),b.addClass("active");var d=$.extend({},a.tinymce&&a.tinymce.config?a.tinymce.config:{},{inline:!0,oninit:function(b){$("#"+b.settings.id).focus(),a.tinymce.config.oninit&&"function"==typeof a.tinymce.config.oninit&&a.tinymce.config.oninit(b)}});b.tinymce(d)}})},deinit:function(a,b){b.filter(".active").each(function(){var a=$(this),b=a.tinymce();b&&b.remove(),a.removeClass("active").removeAttr("id").removeAttr("style").removeAttr("spellcheck")})},initialContent:"<p>Lorem ipsum dolores</p>"}}();
//# sourceMappingURL=jquery.grideditor.min.js.map