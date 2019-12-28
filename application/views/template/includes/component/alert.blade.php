<script src="{{base_url('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
	var errr = "{{$slot}}"
	swal({
				title: 'Error',
				text: errr,
				icon: 'error',
				buttons: {
					cancel: {
						text: 'Close',
						value: null,
						visible: true,
						className: 'btn btn-danger',
						closeModal: true,
					}
				}
		});
</script>