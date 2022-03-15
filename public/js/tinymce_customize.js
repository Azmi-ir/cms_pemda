tinymce.init(
    window.voyagerTinyMCE.getConfig({
        menubar: "edit view insert format tools table tc help",
        selector: "textarea.richTextBox",
        themes: "modern",
        skin_url:
            $('meta[name="assets-path"]').attr("content") +
            "?path=js/skins/voyager",
        min_height: 600,
        resize: "vertical",
        plugins: "link image code table textcolor lists",
        media_alt_source: false,
        media_poster: false,
        media_dimensions: false,
        media_live_embeds: true,
        extended_valid_elements:
            "input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",
        file_browser_callback: function (field_name, url, type, win) {
            // if (type == "image") {
                $("#upload_file").trigger("click");
            // }
        },
        video_template_callback: function(data) {
            return '<video width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls="controls">\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
          },
        toolbar:
            "undo redo | styleselect bold italic underline strikethrough | fontsizeselect formatselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image table | code fullscreen",
        convert_urls: false,
        image_caption: true,
        image_title: true,
        init_instance_callback: function (editor) {
            
            editor.on('ExecCommand', (event) => {
                const command = event.command;
            //   if (command === 'mceMedia') {
                const tabElems = document.querySelectorAll('div[role="tablist"]');
                console.log(tabElems);
                tabElems.forEach(tabElem => {
                    if (tabElem.innerText === 'Embed') {
                      tabElem.style.display = 'none';
                  }
                });
            //   }
            });

            if (typeof tinymce_init_callback !== "undefined") {
                tinymce_init_callback(editor);
            }
        },
        setup: function (editor) {
            
            if (typeof tinymce_setup_callback !== "undefined") {
                tinymce_setup_callback(editor);
            }
        },
    })
);

tinymce.on('ExecCommand', function(e) {
    console.log('Added editor with id: ' + e.editor.id);
  });