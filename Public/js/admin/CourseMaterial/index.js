define(function(require, exports, module) {
    var $ = require('jquery-3.3.1')
    var Notify = require('common/bootstrap-notify')

    var $checkbox = $('input[name="check"]')

    var $checkbox = $('input[name="check"]')

    $('#checkall').click(function() {
        var checked = this.checked

        $checkbox.each(function() {
            this.checked = checked
        })
    })

    require('confirmation')

    $('.delete').confirmation({
        title: '确认要删除吗？',
        singleton: true,
        btnOkLabel: '是',
        btnCancelLabel: '否',
        onConfirm: function() {
            var id = this.$element.data('id')
            var checkIds = []

            checkIds.push(id)

            // 使用ajax提交数据
            $.ajax({
                url: '/Admin/CourseMaterial/delete',
                type: 'POST',
                data: {
                    check_ids: checkIds
                },
                success: function(response) {
                    if (response.success) {
                        // 提示删除成功
                        Notify.success(response.message)
                            // 刷新页面
                        window.location.reload()
                    } else {
                        // 提示删除失败
                        Notify.danger(response.message)
                    }
                }
            })
        }
    })

    $('#deleteAll').confirmation({
        title: '确认要删除吗？',
        singleton: true,
        btnOkLabel: '是',
        btnCancelLabel: '否',
        onConfirm: function() {
            var checkIds = []
            $checkbox.each(function() {
                if (this.checked) {
                    checkIds.push(this.value)
                }
            })

            if (checkIds.length <= 0) {
                Notify.danger('请选择至少一条记录')
                return
            }

            // 使用ajax提交数据
            $.ajax({
                url: '/Admin/CourseMaterial/delete',
                type: 'POST',
                data: {
                    check_ids: checkIds
                },
                success: function(response) {
                    if (response.success) {
                        Notify.success(response.message)
                            // 刷新页面
                        window.location.reload();
                    } else {
                        Notify.danger(response.message)
                    }
                }
            })
        }
    })
})