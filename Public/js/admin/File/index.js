define(function(require, exports, module){
	var $ = require('jquery-3.3.1')
	var Notify = require('bootstrap-notify')

	var $checkbox = $('input[name="check"]')

	var check = []

	$('#checkall').click(function(){
		var checked = this.checked

		$checkbox.each(function(){
			this.checked = checked
		})
		//this.checked ? $checkbox.attr('checked', 'checked') : $checkbox.removeAttr('checked')
	})

	require('confirmation')

	$('.delete').confirmation({
		title: '确认要删除吗？',
		singleton: true,
		btnOkLabel: '是',
		btnCancelLabel: '否',
		onConfirm: function(){
			var id = this.$element.attr('data-id')
			var checkIds = []

			checkIds.push(id)

			// 使用ajax提交数据
			$.ajax({
				url: '/edu/Admin/File/delete',
				type: 'POST',
				data: {
					check_ids: checkIds
				},
				success: function(data){
					if (data.success) {
						// 提示删除成功
						Notify.success(data.message)
						// 刷新页面
						window.location.reload();

					} else {
						// 提示删除失败
						Notify.danger(data.message)
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
		onConfirm: function(){
			var checkIds = []

			$checkbox.each(function(){
				if(this.checked){
					checkIds.push(this.value)
				}
			})

			if (checkIds.length <= 0) {
        Notify.danger('请选择至少一条记录')
				return
			}

			// 使用ajax提交数据
			$.ajax({
				url: '/edu/Admin/File/delete',
				type: 'POST',
				data: {
					check_ids: checkIds
				},
				success: function(data){
					if (data.success) {
            Notify.success(data.message)

						// 刷新页面
						window.location.reload();

					} else {
						Notify.danger(data.message)
					}
				}
			})
		}
	})

})