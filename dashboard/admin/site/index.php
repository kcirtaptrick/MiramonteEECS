
<?php 
require '../../../default/require.php';
$conn = connect();
$userInfo = $conn->query("select * from userInfo where username=\"username\"")->fetch_assoc();
?>
<html lang="en" class=" ">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Dashboard</title>
      <?php
      getModule('dash/styles');
      ?>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <?php
            // Side Nav
            getModule('dash/sidenav');
            // Top Nav
            getModule('dash/topnav');
            ?>
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 1875px;">
               <div class="x_panel" id="page-editor">
                  <div class="x_title">
                     <div class="btns">
                        <btn class="save" style="background: #0e0; color: white" onclick="saveFile()">Save</btn>
                        <btn class="discard" style="background: #f00; color: white">Discard</btn>
                     </div>
                     <header>Edit Page</header>
                     
                  </div>
                  <div class="x_content">
                     <div id="tree-view">
                        <header>Tree View</header>
                        <?php
                        getModule('tree');
                        treeView(root(), '/clubs');
                        ?>
                     </div>
                     <div class="file">
                        <header>New File</header>
                        <div id="ace-editor"></div>
                        <div class="preview"></div>
                     </div>
                  </div>
               </div>
            </div>
            </div>
            <!-- /page content -->
         </div>
      </div>
      <?php
      getModule('dash/script');
      ?>
      <script src="split.js"></script>
      <script>
         var split = Split(['#tree-view', '#page-editor .file'], {
         	sizes: [15, 85],
         	gutterSize: 10,
         	direction: 'horizontal',
         	gutterStyle: function(dimension, gutterSize) {
         		return { 'flex-basis': gutterSize + 'px' }
         	}
         })
         var file = {
         	path: ""
         }
         var getMode = (path) => {
         	console.log(path)
         	return `ace/mode/${append()}`;
         
         	function append() {
         		console.log(path.replace(/.*[.](.*)/, "$1"))
         		switch (path.replace(/.*[.](.*)/, "$1")) {
         			case "html":
         				return "html";
         			case "htm":
         				return "html";
         			case "css":
         				return "css";
         			case "js":
         				return "javascript";
         			case "php":
         				return "php";
         			case "json":
         				return "json";
         			default:
         				return "text";
         		}
         	}
         }
         
         function rename (oldPath, newPath, success) {
         	$.ajax({
         		url: '../../../../../default/file/rename.php',
         		type: 'POST',
         		data: {
         			old_path: oldPath,
         			new_path: newPath
         		},
         		success: success,
         		error: (e) => {
         			console.log('error: ');
         			console.log(e);
         		}
         	});
         }
         function getFile(path) {
         	file.path = path;
         	$.ajax({
         		url: '../../../../../default/file/getContents.php',
         		type: 'POST',
         		data: {
         			path: path
         		},
         		success: function(msg) {
         			editor.session.setValue(msg);
         			editor.session.setMode(modelist.getModeForPath(path));
         			$('#page-editor .file header').html(path);
         		},
         		error: (e) => {
         			console.log('error: ');
         			console.log(e);
         		}
         	});
         }
         function deleteFile() {
         	$.ajax({
         		url: '../../../../../default/file/delete.php',
         		type: 'POST',
         		data: {
         			
         		},
         		success: function(msg) {
         			
         		},
         		error: (e) => {
         			
         		}
         	});
         }
         $('#page-editor .x_title .btns btn.save').click(() => {
         	saveFile();
         });
         function saveFile(path) {
         	$.ajax({
         		url: '../../../../../default/file/putContents.php',
         		type: 'POST',
         		data: {
         			path: file.path,
         			content: editor.session.getValue()
         		},
         		success: function(msg) {
         			console.log('success');
         		},
         		error: (e) => {
         			console.log('error: ');
         			console.log(e);
         		}
         	});
         }
         $.fn.extend({
         	treed: function(o) {
         		var openedClass = 'fa-minus';
         		var closedClass = 'fa-plus';
         
         		if (typeof o != 'undefined') {
         			if (typeof o.openedClass != 'undefined') {
         				openedClass = o.openedClass;
         			}
         			if (typeof o.closedClass != 'undefined') {
         				closedClass = o.closedClass;
         			}
         		};
         		//initialize each of the top levels
         		var tree = $(this);
         		tree.find('ul').addClass("tree");
         		tree.find('li').has("ul").each(function() {
         			var branch = $(this); //li with children ul
         			branch.prepend("<i class='indicator fas " + closedClass + "'></i>");
         			branch.addClass('branch');
         			branch.on('click', function(e) {
         				if (this == e.target) {
         					var icon = $(this).children('i:first');
         					icon.toggleClass(openedClass + " " + closedClass);
         					$(this).children().children().toggle();
         				}
         			});
         			/*branch.contextmenu((e) => {
         				e.preventDefault();
         			});*/
         			branch.children().children().toggle();
         		});
         		tree.find('li:not(:has(ul))').each(function() {
         			var leaf = $(this);
         			leaf.dblclick(function(e) {
         				var clicked = $(this);
         				if (this == e.target) {
         					$('#page-editor .file iframe').css('display', 'none');
         					$('#ace-editor').css('display', 'block');
         					getFile(clicked.attr('path'));
         				}
         			});
         		})
         		//fire event from the dynamically added icon
         		tree.find('.branch .indicator, .branch span').each(function() {
         			$(this).on('click', function() {
         				$(this).closest('li').click();
         			});
         		});
         		//fire event to open branch if the li contains an anchor instead of text
         		tree.find('.branch>a').each(function() {
         			$(this).on('click', function(e) {
         				$(this).closest('li').click();
         				e.preventDefault();
         			});
         		});
         		//fire event to open branch if the li contains a button instead of text
         		tree.find('.branch>button').each(function() {
         			$(this).on('click', function(e) {
         				$(this).closest('li').click();
         				e.preventDefault();
         			});
         		});
         	}
         });
         
         $('#tree-view').treed({ openedClass: 'fa-folder-open', closedClass: 'fa-folder' });
         $('#tree-view .first').trigger('click');
         var editor = ace.edit("ace-editor");
         var modelist = ace.require('ace/ext/modelist');
         
         
         $('body').append('<ul class="context-menu"></ul>');
         var cm = $(".context-menu");
         $('#tree-view li:not(:has(ul))').contextmenu(function(e) {
         	e.preventDefault();
         	cm.html(`
         		<li action='preview'><i class='fa fa-search'></i>Preview</li>
         		<li action='edit'><i class='fa fa-pencil'></i>Edit</li>
         		<li action='rename'><i class='fa fa-i-cursor'></i>Rename</li>
         		<li action='delete'><i class='fa fa-trash'></i>Delete</li>
         		<li action='action'><i class='fa fa-cog'></i>Edit Action</li>
         	`);
         	cm.finish().addClass("show").css({
         		top: e.pageY + "px",
         		left: e.pageX + "px"
         	}); 
         	let thiscm = this;
         	let file = $(this).attr('path');
         	console.log(file);
         	cm.find('li').on("click", (e) => {
         		console.log($(e.target).attr('action'));
         		switch ($(e.target).attr("action")) {
         			case "preview":
         				let preview = true;
         				$('#ace-editor').css('display', 'none');
         				getFile(file);
         				let $c9 = /\/home\/ubuntu\/workspace(.*)/;
         				let $public = /(.*\/public_html)/i;
         				console.log('start')
         				console.log(`<iframe id="preview-frame" src="${file.replace('/home/ubuntu/workspace', '')}" name="${Date.now()}">`);
         				$('#page-editor .file .preview').html(`<iframe id="preview-frame" src="${file.replace('/home/ubuntu/workspace', '')}">`);
         				document.getElementById('preview-frame').onload = () => {
         					preview && document.getElementById('preview-frame').contentWindow.location.reload();
         					preview = false;
         				}
         				break;
         			case "edit":
         				$('#page-editor .file .preview').css('display', 'none');
         				$('#ace-editor').css('display', 'block');
         				getFile(file);
         				break;
         			case "rename":
         				$(thiscm).html(`<input type="text" value="${$(thiscm).html()}"/>`);
         				let input = $(thiscm).find('input');
         				input.css("padding", "0");
         				$(thiscm).on("keydown", (e) => {
         					if(e.which == 13) {
         						let newPath = file.replace(/(.*\/).*/, '$1') + input.val();
         						rename(file, newPath);
         						$(thiscm).html(input.val());
         						$(thiscm).attr('path', newPath);
         					}
         				});
         				break;
         			case "paste":
         				alert("Pasted");
         				break;
         			case "delete":
         				deleteFile();
         				
         				break;
         			case "action":
         				alert("Actioned");
         				break;
         		}
         		cm.removeClass("show");
         	});
         });
         $('#tree-view li:has(ul)').contextmenu((e) => {
         	e.preventDefault();
         })
         $('#tree-view li:has(ul) .indicator, #tree-view li:has(ul) span').contextmenu(function(e) {
         	e.preventDefault();
         	cm.html(`
         		<li action='add-file'><i class='fa fa-file'></i>Add File</li>
         		<li action='add-folder'><i class='fa fa-folder'></i>Add Folder</li>
         		<li action='rename'><i class='fa fa-paste'></i>Rename</li>
         		<li action='delete'><i class='fa fa-trash'></i>Delete</li>
         		<li action='action'><i class='fa fa-cog'></i>Edit Action</li>
         	`);
         	cm.finish().addClass("show").css({
         		top: e.pageY + "px",
         		left: e.pageX + "px"
         	});
         	let thiscm = this;
         	let folder = this;
         	cm.find('li').on("click", () => {
         		switch ($(this).attr("action")) {
         			case "edit":
         				getFile(folder);
         				break;
         			case "copy":
         				alert("Copied");
         				break;
         			case "rename":
         				$(thiscm).html(`<input type="text" value="${$(thiscm).html()}"/>`);
         				let input = $(thiscm).find('input');
         				input.css("padding", "0");
         				$(thiscm).on("keydown", (e) => {
         					if(e.which == 13) {
         						let newPath = file.replace(/(.*\/).*/, '$1') + input.val();
         						rename(file, newPath);
         						$(thiscm).html(input.val());
         						$(thiscm).attr('path', newPath);
         					}
         				});
         				break;
         			case "delete":
         				alert("Deleted");
         				break;
         			case "action":
         				alert("Actioned");
         				break;
         		}
         		cm.removeClass("show");
         	});
         });
         cm.contextmenu((e) => { e.preventDefault() });
         // Hide if clicked off menu
         
         $(document).on("click", function(event) {
         	if ($(event.target).closest(".context-menu").length == 0) {
         		cm.removeClass("show");
         	}
         });
      </script>
      <div class="jqvmap-label" style="display: none;"></div>
   </body>
</html>