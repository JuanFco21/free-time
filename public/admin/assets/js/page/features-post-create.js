"use strict";

$("select").selectric();
$.uploadPreview({
  input_field: "#image-upload",   // Default: .image-upload
  preview_box: "#image-preview",  // Default: .image-preview
  label_field: "#image-label",    // Default: .image-label
  label_default: "Sube una imagen",   // Default: Choose File
  label_selected: "Cambiar Archivo",  // Default: Change File
  no_label: false,                // Default: false
  success_callback: null          // Default: null
});
$(".inputtags").tagsinput('items');
