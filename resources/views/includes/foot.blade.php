<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery.min.js') }}"><\/script>')</script>
<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script>
  	var client = algoliasearch('{{ config('scout.algolia.id') }}', '{{ config('scout.algolia.searchonlysecret') }}');
  	var assets = client.initIndex('assets');
	var consumables = client.initIndex('consumables');

	$('#search-input').autocomplete({ hint: false }, [
		{
			source: $.fn.autocomplete.sources.hits(assets, { hitsPerPage: 3 }),
			displayKey: 'name',
			templates: {
				header: '<div class="aa-suggestions-category">Assets</div>',
				suggestion: function(suggestion) {
					suggestion['url'] = ('{{ route('assets.view', '') }}/' + suggestion.id);
					return suggestion._highlightResult.name.value + '<br><small class="text-muted">' + suggestion._highlightResult.id_hash.value + '</small>';
				}
			}
		},
		{
			source: $.fn.autocomplete.sources.hits(consumables, { hitsPerPage: 3 }),
			displayKey: 'name',
			templates: {
				header: '<div class="aa-suggestions-category">Consumables</div>',
				suggestion: function(suggestion) {
					suggestion['url'] = ('{{ route('consumables.view', '') }}/' + suggestion.id);
					return suggestion._highlightResult.name.value + '<br><small class="text-muted">' + suggestion._highlightResult.id_hash.value + '</small>';
				}
			}
		}
	]).on('autocomplete:selected', function(event, suggestion, dataset) {
		location.href = suggestion.url;
		console.log(suggestion)
	});

	$(function () {
		$('[data-toggle="popover"]').popover({
			html: true,
		})
	})
</script>