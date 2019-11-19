(function( $ ) {
	'use strict';

	$(window).load(function(){
		var _tab_container = $('#stepTab');

		var Cookie = {
			Create: function (name, value, days) {
			   var expires = "";

			    if (days) {
			       var date = new Date();
			       date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			       expires = "; expires=" + date.toGMTString();
			   }

			   document.cookie = name + "=" + value + expires + "; path=/";
			},
			Get: function (name) {

			  var nameEQ = name + "=";
			  var ca = document.cookie.split(";");

			  for (var i = 0; i < ca.length; i++) {
			      var c = ca[i];
			      while (c.charAt(0) == " ") c = c.substring(1, c.length);
			      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
			  }

			  return null;
			},
			Erase: function (name) {
			  Cookie.Create(name, "", -1);
			}
		};//var Cookie


		var CurrentStep = (function(){
			return {
				set : function(_current_step) {
					var _cookie_prefix = 'current-step';
					var _get_cookie = '';
					var _input_current_step = $('#current-step');

					$('#stepTab a').on('click', function (e) {
					  e.preventDefault()
					  var _this = $(this);
						var _current_tab = _this.attr('href');

						_input_current_step.val(_current_tab);

						Cookie.Create(_cookie_prefix, _current_tab, 1);
					});

					_get_cookie = Cookie.Get(_cookie_prefix);
					if(_get_cookie){
						_input_current_step.val(_get_cookie);
					}

				},
			}
		})();

		var SelectLocation = (function () {

			var _get_location_click = '';
			var _input_au_state = $('#input-js-au-state');

		  return {

				set: function() {
					var _cookie_prefix = 'au-state';
					var _get_cookie = '';


					$('.js-au-state').on('click', function(e, _get_location_click){
						e.preventDefault();

						var _this = $(this);
						_get_location_click = _this.data('au-state');
						_input_au_state.val(_get_location_click);

						//incase the page was reloaded
						Cookie.Create(_cookie_prefix, _get_location_click, 1);
						_this.parent().toggleClass('select-active').siblings().removeClass('select-active');
					});

					_get_cookie = Cookie.Get(_cookie_prefix);
					if(_get_cookie){
						_input_au_state.val(_get_cookie);
					}

				},

				getValue: function() {
					return _input_au_state.val();
				},

				onClick: function() {
					_input_au_state.on('click', function(e){
						return _input_au_state.val();
					});
				},

		  }
		})();

		var SelectLength = (function () {

			var _input_length = $('.js-length');

		  return {

				getValue: function() {
					return _input_length.val();
				},

				convertToM: function() {
					return ( Number(_input_length.val()) * 1000 );
				},

		  }
		})();

		var SelectBoardHeight = (function () {

			var _input_height = $('.js-height');

		  return {

				getValue: function() {
					return Number(_input_height.val());
				},

				isVisible: function() {

				},

		  }
		})();

		var SelectFenceType = (function () {

			var _input_fence_type = $('#input-js-fence-type');

			return {

				set: function() {
					var _cookie_prefix = 'fence-type';
					var _get_cookie = '';


					$('.js-fence-type').on('click', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('fence-type');

						_input_fence_type.val(_get_data);

						//incase the page was reloaded
						Cookie.Create(_cookie_prefix, _get_data, 1);

						if(_get_data == 'pailing'){
							$('.pailing-type-shape').show();
							$('.picket-type-shape').hide();
						}else{
							$('.picket-type-shape').show();
							$('.pailing-type-shape').hide();
						}
						_this.parent().toggleClass('select-active').siblings().removeClass('select-active');
					});

					_get_cookie = Cookie.Get(_cookie_prefix);
					if(_get_cookie){
						_input_fence_type.val(_get_cookie);
					}

				},

				getValue: function() {
					return _input_fence_type.val();
				},

		  }
		})();

		var SelectFenceTypeShape = (function () {
			var _input_fence_type_shape = $('#input-js-fence-type-shape');

		  return {

				set: function() {
					var _cookie_prefix = 'fence-type-shape';
					var _get_cookie = '';

					$('.js-fence-type-shape').on('click', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('type-shape');

						_input_fence_type_shape.val(_get_data);

						//incase the page was reloaded
						Cookie.Create(_cookie_prefix, _get_data, 1);
						_this.parent().toggleClass('select-active').siblings().removeClass('select-active');
					});

					_get_cookie = Cookie.Get(_cookie_prefix);
					if(_get_cookie){
						_input_fence_type_shape.val(_get_cookie);
					}

				},

				getValue: function() {
					return _input_fence_type_shape.val();
				},

		  }
		})();

		var SelectTimberSpecies = (function () {

		  return {

				set: function() {
					var _cookie_prefix = 'timber-species';
					var _get_cookie = '';
					var _input_timber_species = $('#input-js-timber-species');

					$('.js-timber-species').on('click', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('timber-species');

						_input_timber_species.val(_get_data);

						//incase the page was reloaded
						Cookie.Create(_cookie_prefix, _get_data, 1);
						_this.parent().toggleClass('select-active').siblings().removeClass('select-active');
					});

					_get_cookie = Cookie.Get(_cookie_prefix);
					if(_get_cookie){
						_input_timber_species.val(_get_cookie);
					}

				},

		  }
		})();

		var SelectCapping = (function () {
			var _input_capping = $('#input-js-capping');
			var _input_capping_val = $('#input-js-capping-val');

		  return {

				set: function() {
					var _cookie_prefix = 'capping';
					var _get_cookie = '';

					$('.js-capping').on('click', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('capping');
						var _get_data_val = _this.data('val');

						_input_capping.val(_get_data);
						_input_capping_val.val(_get_data_val);
						//incase the page was reloaded
						Cookie.Create(_cookie_prefix, _get_data, 1);
						_this.parent().toggleClass('select-active').siblings().removeClass('select-active');
					});

					_get_cookie = Cookie.Get(_cookie_prefix);
					if(_get_cookie){
						_input_capping.val(_get_cookie);
						_input_capping_val.val(_get_cookie);
					}

				},

				getValue: function() {
					return _input_capping_val.val();
				},

		  }
		})();

		var SelectPlinth = (function () {
			var _input_plinth = $('#input-js-plinth');
			var _input_plinth_val = $('#input-js-plinth-val');

		  return {

				set: function() {
					var _cookie_prefix = 'plinth';
					var _get_cookie = '';

					$('.js-plinth').on('click', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('plinth');
						var _get_data_val = _this.data('val');

						_input_plinth.val(_get_data);
						_input_plinth_val.val(_get_data_val);
						//incase the page was reloaded
						Cookie.Create(_cookie_prefix, _get_data, 1);
						_this.parent().toggleClass('select-active').siblings().removeClass('select-active');
					});

					_get_cookie = Cookie.Get(_cookie_prefix);
					if(_get_cookie){
						_input_plinth.val(_get_cookie);
						_input_plinth_val.val(_get_cookie);
					}

				},

				getValue: function() {
					return _input_plinth_val.val();
				},

				getPlinthLabel: function() {
					return _input_plinth.val();
				},
		  }
		})();

		function round_to_precision(x, precision) {
		    var y = +x + (precision === undefined ? 0.5 : precision/2);
		    return y - (y % (precision === undefined ? 1 : +precision));
		}

		var CalculateTimberUnits = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _length 					= $('.js-length');
					var _width 						= $('.js-width');
					var _spacing 					= $('.js-spacing');
					var _pailing_overlap 	= $('.js-pailing-overlap');

					var _length_m = SelectLength.convertToM();

					var _get_fence_type = SelectFenceType.getValue();

					var _overlap = 0;
					if(_get_fence_type == 'pailing'){
						_overlap = Number(_pailing_overlap.val());
					}

					var _calc_plus = ( Number(_width.val()) + Number(_overlap) );

					_calc = ( _length_m / ( _calc_plus ) );

					return _calc;
				},

				getValue: function() {
					return Math.ceil(_calc);
				},

				init: function() {
					var _get_calc = Math.ceil(CalculateTimberUnits.calc());
					$('.calculate_timber_units').val(_get_calc);
				},

				onClick: function() {
					$('.calculate_timber_units').on('click', function(e){
						e.preventDefault();
						var _msg = $('.calculate_timber_units_msg');
						var _get_calc = Math.ceil(CalculateTimberUnits.calc());
						console.log(_get_calc);
					});
				},
			}
		})();

		var CalculateVerticalFencePost = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _length 	= $('.js-length');
					var _length_m = SelectLength.convertToM();

					var _location					= SelectLocation.getValue();
					var _location_val			= 2400;

					if(_location == 'wa'){
						_location_val = 2700;
					}

					var _calc_plus = ( _location_val + 1 );

					_calc = ( _length_m / ( _calc_plus ) );

					return _calc;
				},

				getValue: function() {
					return Math.ceil(_calc);
				},

				init: function() {
					var _get_calc = Math.ceil(CalculateVerticalFencePost.calc());
					$('.calculate_vertical_fence_post').val(_get_calc);
				},

				onClick: function() {
					$('.calculate_vertical_fence_post').on('click', function(e){
						e.preventDefault();

						var _get_calc = Math.ceil(CalculateVerticalFencePost.calc());
						console.log(_get_calc);
					});
				},
			}
		})();

		var CalculateMinHeightVerticalFencePost = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _width 				= SelectLength.convertToM();
					var _board_height = SelectBoardHeight.getValue();
					var _get_plinth   = Number(SelectPlinth.getValue());


					var _picket_pailing_height = ( _board_height + 600 );

					var _plinth = 0;
					if(_get_plinth == 1){
						var _plinth = 150;
					}else if(_get_plinth == 2){
						var _plinth = 300;
					}

					_calc = ( _picket_pailing_height + _plinth );

					return _calc;
				},

				getValue: function() {
					return Math.ceil(_calc);
				},

				onClick: function() {
					$('.calculate_min_height_vertical_fence_post').on('click', function(e){
						e.preventDefault();

						var _get_calc = Math.ceil(CalculateMinHeightVerticalFencePost.calc());
						console.log(_get_calc);
					});
				},

				init: function() {
					var _get_calc = Math.ceil(CalculateMinHeightVerticalFencePost.calc());
					$('.calculate_min_height_vertical_fence_post').val(_get_calc);
				},
			}
		})();

		var CalculateTimberCappingUnits = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _length_m = SelectLength.convertToM();
					var _location	= SelectLocation.getValue();
					var _capping  = SelectCapping.getValue();

					var _calc_capping_location = 0;

					if(_capping == 1){
						if(_location == 'wa' || _location == 'qld-fnq'){
							_calc_capping_location = 4800
						}else{
							_calc_capping_location = 5400;
						}
					}

					_calc = ( _length_m / _calc_capping_location );

					return _calc;
				},

				getValue: function() {
					return Math.ceil(_calc);
				},

				init: function() {
					var _get_calc = Math.ceil(CalculateTimberCappingUnits.calc());
					$('.calculate_timber_capping_units').val(_get_calc);
				},

				onClick: function() {
					$('.calculate_timber_capping_units').on('click', function(e){
						e.preventDefault();

						var _get_calc = Math.ceil(CalculateTimberCappingUnits.calc());
						console.log(_get_calc);
					});
				},
			}
		})();

		/**
		* Nail / Screws
		**/
		var CalculateFixings = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _timber_units 			= Math.ceil(CalculateTimberUnits.calc());
					var _vertica_fence_post	= Math.ceil(CalculateVerticalFencePost.calc());
					_calc = ( ( Number(_timber_units) + Number(_vertica_fence_post) ) * 4);

					return _calc;
				},

				getValue: function() {
					return Math.ceil(_calc);
				},

				init: function() {
					var _get_calc = Math.ceil(CalculateFixings.calc());
					$('.calculate_fixings').val(_get_calc);
				},

				onClick: function() {
					$('.calculate_fixings').on('click', function(e){
						e.preventDefault();

						var _get_calc = Math.ceil(CalculateFixings.calc());
						console.log(_get_calc);
					});
				},
			}
		})();

		var CalculateOverLappingTimberUnits = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _fence_type 	= SelectFenceType.getValue();
					var _timber_units = Math.ceil(CalculateTimberUnits.calc());

					var _calc_fence = 0;
					if(_fence_type == 'picket'){
						_calc_fence = 0;
					}else if(_fence_type == 'pailing'){
						_calc_fence = (Number(_timber_units) - 1);
					}

					_calc = _calc_fence;

					return _calc;
				},

				getValue: function() {
					return _calc;
				},

				init: function() {
					var _get_calc = CalculateOverLappingTimberUnits.calc();
					$('.calculate_overlapping_timber_units').val(_get_calc);
				},

				onClick: function() {
					$('.calculate_overlapping_timber_units').on('click', function(e){
						e.preventDefault();

						var _get_calc = CalculateOverLappingTimberUnits.calc();
						console.log(_get_calc);
					});
				},
			}
		})();

		var CalculateHorizontalSupportRail = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _length_m 		= SelectLength.convertToM();
					var _location			= SelectLocation.getValue();
					var _board_height = SelectBoardHeight.getValue();

					var _calc_location = 5400;
					if(_location == 'wa'){
						_calc_location = 4800;
					}

					var _calc_board_height = 3;
					if(_board_height <= 1500){
						var _calc_board_height = 2;
					}

					_calc = ( (_length_m /_calc_location) * (_calc_board_height) );

					return _calc;
				},

				getValue: function() {
					return Math.round(_calc);
				},

				init: function() {
					var _get_calc = Math.round(CalculateHorizontalSupportRail.calc());
					$('.calculate_horizontal_support').val(_get_calc);
				},

				onClick: function() {
					$('.calculate_horizontal_support').on('click', function(e){
						e.preventDefault();

						var _get_calc = Math.round(CalculateHorizontalSupportRail.calc());
						console.log(_get_calc);
					});
				},
			}
		})();

		var CalculateTotalPicketPailing = (function(){
			var _calc = 0;

			return {
				calc: function() {
					var _timber_units 							= Math.ceil(CalculateTimberUnits.calc());
					var _overlapping_timber_units 	= CalculateOverLappingTimberUnits.calc();

					_calc = ( Number(_timber_units) + Number(_overlapping_timber_units) );

					return _calc;
				},

				getValue: function() {
					return Math.round(_calc);
				},

				init: function() {
					var _get_calc = CalculateTotalPicketPailing.calc();
					$('.calculate_total_picket_pailing').val(_get_calc);

				},

				onClick: function() {
					$('.calculate_total_picket_pailing').on('click', function(e){
						e.preventDefault();

						var _get_calc = CalculateTotalPicketPailing.calc();
						console.log(_get_calc);
					});
				},
			}
		})();

		var AjaxLocationTypeShape = (function(){
			var _select_height;
			var _tab_container_id;
			var _tab_id;
			var _has_js_height;

			function _ajaxLocationTypeShape(location, fence_type, fence_shape) {
				var data = {
					'action': 'get_location_type_shape',
					'location': location,
					'fence_type': fence_type,
					'fence_shape': fence_shape,
				};

				var request = $.ajax({
					url: ajax_object.ajax_url,
					method: "POST",
					data: data,
					dataType: "json"
				});

				request.success(function( msg ) {
					console.log(msg);
					var _js_height_select = $('.js-height');

					$.each(msg.data,function(key, value){
					    _js_height_select.append('<option value=' + value + '>' + value + '</option>');
					});

				});

				request.fail(function( jqXHR, textStatus ) {
					console.log("Request failed: " + textStatus);
				});
			}

			return {
				init: function() {
					_tab_container.on('shown.bs.tab', function (e) {
						var _location = SelectLocation.getValue();
						var _fence_type = SelectFenceType.getValue();
						var _fence_shape = SelectFenceTypeShape.getValue();

						var current_target = e.target;

						_tab_container_id = $(current_target).attr('aria-controls');
						_tab_id = $('#' + _tab_container_id);

						_has_js_height = _tab_id.find('.js-height');
						if(_has_js_height.length == 1){
							_has_js_height.empty();
							console.log(_location);
							console.log(_fence_type);
							console.log(_fence_shape);
							_ajaxLocationTypeShape(_location, _fence_type, _fence_shape);
						}

					});

				},
			}
		})();

		var TabCalc = (function(){
			return {
				init: function() {
					_tab_container.on('shown.bs.tab', function (e) {
					  var current_target = e.target;
						if($(current_target).hasClass('index-last-step')){
							CalculateTimberUnits.init();
							CalculateVerticalFencePost.init();
							CalculateMinHeightVerticalFencePost.init();
							CalculateTimberCappingUnits.init();
							CalculateFixings.init();
							CalculateOverLappingTimberUnits.init();
							CalculateHorizontalSupportRail.init();
							CalculateTotalPicketPailing.init();
						}
					});
				},
			}
		})();

		$(document).ready(function() {
			SelectLocation.set();
			SelectFenceType.set();
			SelectFenceTypeShape.set();
			SelectTimberSpecies.set();
			SelectCapping.set();
			SelectPlinth.set();
			CurrentStep.set();

			TabCalc.init();
			AjaxLocationTypeShape.init();

			$('.btnNext').click(function() {
				$('.nav-tabs .active').parent().next('li').find('a').trigger('click');
			});

			$('.btnPrevious').click(function() {
				$('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
			});

		});

	});
})( jQuery );
