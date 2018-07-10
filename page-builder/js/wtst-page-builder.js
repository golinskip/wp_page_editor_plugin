
    var pb = {
        handler: null,
        frozen: false,
        enabled: 0,
        type: null,
        type_id: 0,
        currentObjHdl: null,
        init: {
            resetID: function () {
                if (pb.frozen)
                    return false;
                var secCnt = 0;
                var colCnt = 0;
                var objCnt = 0;
                jQuery(pb.handler + ' .pb-sec').each(function () {
                    secCnt++;
                    jQuery(this).attr('id', 'pb-sec-' + secCnt);
                });
                jQuery(pb.handler + ' .pb-col').each(function () {
                    colCnt++;
                    jQuery(this).attr('id', 'pb-col-' + colCnt);
                });
                jQuery(pb.handler + ' .pb-obj').each(function () {
                    objCnt++;
                    jQuery(this).attr('id', 'pb-obj-' + objCnt);
                });
            },

            buttons: function () {
                jQuery(pb.handler + ' #pb-save').click(function (e) {
                    e.preventDefault();
                    pb.save();
                    return false;
                });
            },

            isEnabled: function () {
                pb.enabled = parseInt(jQuery('#pb-is-enabled').val());
                if (pb.enabled === 1) {
                    pb.enable();
                } else {
                    pb.disable();
                }
                jQuery('#pb-disable').unbind().click(function(e){
                    e.preventDefault();
                    pb.disable();
                    return false;
                });
                jQuery('#pb-enable').unbind().click(function(e){
                    e.preventDefault();
                    pb.enable();
                    return false;
                });
            },

            data: function () {
                var data = {
                    action: 'wtst_pb_parse_backend',
                    type: pb.type,
                    type_id: pb.type_id
                };
                jQuery.post(ajaxurl, data, function (res) {
                    jQuery(pb.handler).html(res.html);
                    pb.init.resetID();
                    pb.init.buttons();
                    pb.init.isEnabled();
                    pb.sec.init();
                    pb.col.init();
                    pb.obj.init();
                }, "json");

            }
        },

        sec: {
            init: function () {
                jQuery('#pb-canvas-content').sortable({
                    handle: ".pb-sec-mover",
                    placeholder: "sortable-placeholder",
                    cancel: ".pb-sec-plus"
                });
                jQuery('.pb-sec-add').unbind().click(function (e) {
                    e.preventDefault();
                    pb.sec.add();
                    return false;
                });
                jQuery('.pb-sec-edit').unbind().click(function (e) {
                    e.preventDefault();
                    var secHdl = jQuery(this).parent().parent();
                    pb.sec.edit(secHdl);
                    return false;
                });
                jQuery('.pb-sec-remove').unbind().click(function (e) {
                    e.preventDefault();
                    var secHdl = jQuery(this).parent().parent();
                    pb.sec.remove(secHdl);
                    return false;
                });
                jQuery('.pb-sec-duplicate').unbind().click(function (e) {
                    e.preventDefault();
                    var secHdl = jQuery(this).parent().parent();
                    pb.sec.duplicate(secHdl);
                    return false;
                });
            },
            add: function () {
                if (pb.frozen)
                    return false;
                var newSec = jQuery(pb.handler + ' input[name=pb-prototype-sec]').val();
                jQuery(pb.handler + ' #pb-canvas-content').append(newSec);
                pb.init.resetID();
                pb.sec.init();
                pb.col.init();
            },
            edit: function (secHdl) {
                if (pb.frozen)
                    return false;
                pb.dialog.editDialog('wtst_pb_dialog_sec_edit', secHdl.attr('id'), 'wtst_pb_dialog_sec_edit_check', function (params) {
                    var attr = JSON.stringify(params);
                    secHdl.attr('data-config', attr);
                });
            },
            remove: function (secHdl) {
                if (pb.frozen)
                    return false;
                if (pb.dialog.confirm('Are you sure?')) {
                    secHdl.remove();
                }
            },
            duplicate: function (secHdl) {
                var colHdlBody = secHdl.parent();
                secHdl.clone().appendTo(colHdlBody);
                pb.sec.init();
                pb.col.init();
                pb.obj.init();
                pb.init.resetID();
            }
        },

        col: {
            init: function () {
                jQuery(".pb-sec-body").sortable({
                    connectWith: '.pb-sec-body',
                    handle: ".pb-col-mover",
                    placeholder: "ui-state-highlight",
                    cancel: ".pb-col-plus"
                });
                jQuery('.pb-col-add').unbind().click(function (e) {
                    var col = jQuery(this).parent().parent();
                    e.preventDefault();
                    pb.col.add(col);
                    return false;
                });
                jQuery('.pb-col-edit').unbind().click(function (e) {
                    e.preventDefault();
                    var colHdl = jQuery(this).parent().parent();
                    pb.col.edit(colHdl);
                    return false;
                });
                jQuery('.pb-col-remove').unbind().click(function (e) {
                    e.preventDefault();
                    var colHdl = jQuery(this).parent().parent();
                    pb.sec.remove(colHdl);
                    return false;
                });
                jQuery('.pb-col-duplicate').unbind().click(function (e) {
                    e.preventDefault();
                    var colHdl = jQuery(this).parent().parent();
                    pb.col.duplicate(colHdl);
                    return false;
                });
            },
            add: function (sec) {
                if (pb.frozen)
                    return false;
                var newCol = jQuery(pb.handler + ' input[name=pb-prototype-col]').val();
                sec.find(' .pb-sec-body').append(newCol);
                pb.init.resetID();
                pb.col.init();
                pb.obj.init();
            },
            edit: function (colHdl) {
                if (pb.frozen)
                    return false;
                pb.dialog.editDialog('wtst_pb_dialog_col_edit', colHdl.attr('id'), 'wtst_pb_dialog_col_edit_check', function (params) {
                    for (var i = 1; i <= 13; i++) {
                        colHdl.removeClass('pb-col-' + i);
                        if (i.toString() == params.size) {
                            if (i == 13) {
                                colHdl.addClass('pb-col-12');
                            } else {
                                colHdl.addClass('pb-col-' + i);
                            }
                        }
                    }
                    var attr = JSON.stringify(params);
                    colHdl.attr('data-config', attr);
                });
            },
            remove: function (colHdl) {
                if (pb.frozen)
                    return false;
                if (pb.dialog.confirm('Are you sure?')) {
                    colHdl.remove();
                }
            },
            duplicate: function (colHdl) {
                var colHdlBody = colHdl.parent();
                colHdl.clone().appendTo(colHdlBody);
                pb.col.init();
                pb.obj.init();
                pb.init.resetID();
            }
        },

        obj: {
            init: function () {
                jQuery(".pb-col-body").sortable({
                    connectWith: '.pb-col-body',
                    handle: ".pb-obj-mover",
                    placeholder: "ui-state-highlight",
                    cancel: ".pb-obj-plus"
                });
                jQuery('.pb-obj-add').unbind().click(function (e) {
                    var colHdl = jQuery(this).parent().parent();
                    e.preventDefault();
                    pb.obj.add(colHdl);
                    return false;
                });
                jQuery('.pb-obj-edit').unbind().click(function (e) {
                    e.preventDefault();
                    var objHdl = jQuery(this).parent().parent();
                    pb.currentObjHdl = objHdl;
                    pb.obj.edit(objHdl);
                    return false;
                });
                jQuery('.pb-obj-remove').unbind().click(function (e) {
                    e.preventDefault();
                    var objHdl = jQuery(this).parent().parent();
                    pb.obj.remove(objHdl);
                    return false;
                });
                jQuery('.pb-obj-duplicate').unbind().click(function (e) {
                    e.preventDefault();
                    var objHdl = jQuery(this).parent().parent();
                    pb.obj.duplicate(objHdl);
                    return false;
                });
            },
            add: function (colHdl) {
                if (pb.frozen)
                    return false;

                pb.dialog.editDialog('wtst_pb_dialog_obj_add', colHdl.attr('id'), 'wtst_pb_dialog_obj_add_check', function (params) {
                    var newObj = jQuery(pb.handler + ' input[name=pb-prototype-obj]').val();
                    colHdl.find(' .pb-col-body').append(newObj);
                    var newObjH = colHdl.find(' .pb-col-body .pb-obj:last');
                    newObjH.attr('data-type', params.structure);
                    newObjH.find('.pb-obj-title').html(params.structure_title);
                    var data = {
                        action: 'wtst_pb_dialog_obj_preview',
                        config: '{}',
                        type: params.structure
                    };
                    jQuery.post(ajaxurl, data, function (res) {
                        newObjH.find(' .pb-obj-body').append(res.html);
                        pb.init.resetID();
                        pb.obj.init();
                    });
                });
            },
            edit: function (objHdl) {
                if (pb.frozen)
                    return false;
                pb.dialog.editDialog('wtst_pb_dialog_obj_edit', objHdl.attr('id'), 'wtst_pb_dialog_obj_edit_check', function (params) {
                    pb.obj.saveEdit(objHdl, params);
                }, {type: objHdl.attr('data-type')});
            },
            editReset: function() {
                var objHdl = pb.currentObjHdl;
                var params = pb.tools.getFormData(jQuery('#pb-dialog form'));
                pb.obj.saveEdit(objHdl, params);
                pb.frozen = false;
                pb.obj.edit(objHdl);
            },
            saveEdit: function(objHdl, params) {
                var attr = JSON.stringify(params);
                    objHdl.attr('data-config', attr);
                    var data = {
                        action: 'wtst_pb_dialog_obj_preview',
                        config: attr,
                        type: objHdl.attr('data-type')
                    };
                    jQuery.post(ajaxurl, data, function (res) {
                        objHdl.find('.pb-obj-body').first().html(res.html);
                    });
            },
            remove: function (objHdl) {
                if (pb.frozen)
                    return false;
                if (pb.dialog.confirm('Are you sure?')) {
                    objHdl.remove();
                }
            },
            duplicate: function (objHdl) {
                var colHdlBody = objHdl.parent();
                objHdl.clone().appendTo(colHdlBody);
                pb.init.resetID();
                pb.obj.init();
            }
        },

        dialog: {
            editDialog: function (action, id, checkAction, onSave, dataInput) {
                pb.freeze();
                var data = {
                    action: action,
                    config: jQuery('#' + id).attr('data-config')
                };
                if (dataInput !== undefined) {
                    Object.assign(data, dataInput);
                }
                ;
                jQuery.post(ajaxurl, data, function (res) {
                    jQuery('#pb-dialog').html(res.html);
                    jQuery('#pb-dialog').attr('title', res.title);
                    jQuery('.ui-dialog-title').html(res.title);
                    jQuery('#pb-dialog').dialog({
                        beforeClose: function (event, ui) {
                            pb.unfreeze();
                        },
                        minWidth: 1000,
                        minHeight: 500
                    });
                    jQuery('#pb-dialog form').submit(function (e) {
                        e.preventDefault();
                        var params = pb.tools.getFormData(jQuery(this));
                        if (pb.tools.isFunction(onSave)) {
                            onSave(params);
                        }
                        jQuery('#pb-dialog').dialog('close');
                        return false;
                    });
                }, "json");
            },
            confirm: function (msg) {
                return confirm(msg);
            }
        },

        tools: {
            getFormData: function (jQueryform) {
                var unindexed_array = jQueryform.serializeArray();
                var indexed_array = {};

                jQuery.map(unindexed_array, function (n, i) {
                    indexed_array[n['name']] = n['value'];
                });
                return JSON.parse(jQueryform.serializeJSON());
            },
            isFunction: function (functionToCheck) {
                return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
            }
        },

        start: function (hdl, type, type_id) {
            pb.type = type;
            pb.type_id = type_id;
            pb.handler = hdl;
            pb.init.data();
        },

        freeze: function () {
            this.frozen = true;
        },

        unfreeze: function () {
            this.frozen = false;
        },

        enable: function () {
            pb.enabled = 1;
            jQuery('#pb-is-enabled').val(1);
            jQuery('#pb-canvas-content').show();
            jQuery('#pb-enable').hide();
            jQuery('#pb-disable').show();
            jQuery('#pg-sec-add').show();
        },

        disable: function () {
            pb.enabled = 0;
            jQuery('#pb-is-enabled').val(0);
            jQuery('#pb-canvas-content').hide();
            jQuery('#pb-disable').hide();
            jQuery('#pb-enable').show();
            jQuery('#pg-sec-add').hide();
        },

        save: function (re) {
            var data = {
                action: 'wtst_pb_save',
                type: pb.type,
                type_id: pb.type_id,
                data: jQuery(pb.handler).html(),
                enabled: pb.enabled
            };
            jQuery.post(ajaxurl, data, function (res) {
                alert(res.data);
                if(re !== undefined) {
                    re(res);
                }
            });
        }

    };
