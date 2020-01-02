<script src="{{base_url('assets/js/bundle.js')}}"></script>
<script src="{{base_url('assets/js/theme/default.js')}}"></script>
<script src="{{base_url('assets/js/apps.min.js')}}"></script>

<script>
	$(document).ready(function() {
		App.init();
	});
</script>

@stack('scripts')