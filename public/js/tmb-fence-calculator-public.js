(function( $ ) {
	'use strict';

	$(window).load(function(){
		var _tab_container = $('#stepTab');

		function show_hide_next_prev_button(action)
		{
			console.log(action);
			if(action == 'show'){
				$('.next-prev-button').show();
			}else{
				$('.next-prev-button').hide();
			}
		}

		function show_hide_nextbutton(action)
		{
			console.log(action);
			if(action == 'show'){
				$('.btnNext').show();
			}else{
				$('.btnNext').hide();
			}
		}

		function show_hide_prevbutton(action)
		{
			console.log(action);
			if(action == 'show'){
				$('.btnPrevious').show();
			}else{
				$('.btnPrevious').hide();
			}
		}

		function toggle_ajax_spinners(action)
		{
			if(action == 'show'){
				$('.ajax-spinners').show();
			}else{
				$('.ajax-spinners').hide();
			}
		}

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

					show_hide_next_prev_button('hide');

					$('.js-au-state').on('click', function(e, _get_location_click){
						e.preventDefault();

						var _this = $(this);
						_get_location_click = _this.data('au-state');
						_input_au_state.val(_get_location_click);

						_this.toggleClass('select-active-map').siblings().removeClass('select-active-map');

						var _has_active = $('.svg-map > a').hasClass('select-active-map');

						if(_has_active){
							show_hide_next_prev_button('show');
						}else{
							_input_au_state.val(0);
							show_hide_next_prev_button('hide');
						}
					});

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
					var _cookie_prefix = 'js-height';
					var _get_cookie = '';

					var _height = Number(_input_height.val());

					// Cookie.Create(_cookie_prefix, _height, 1);
					//
					// _get_cookie = Cookie.Get(_cookie_prefix);
					// if(_get_cookie){
					// 	_input_fence_type.val(_get_cookie);
					// }

					return _height;
				},

				isVisible: function() {

				},

		  }
		})();

		var SelectWidth = (function () {
			var _class_name = '.js-width';
			var _input_width = $('.js-width');

		  return {

				getValue: function() {
					var _width_val = Number(_input_width.val());

					return _width_val;
				},

		  }
		})();

		var SelectFenceType = (function () {

			var _input_fence_type = $('#input-js-fence-type');

			return {

				set: function() {
					var _cookie_prefix = 'fence-type';
					var _get_cookie = '';

					//show_hide_nextbutton('hide');
					//show_hide_prevbutton('show');
					//$('.next-prev-button .btnNext').hide();
					$('.js-fence-type').on('click', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('fence-type');

						_input_fence_type.val(_get_data);

						if(_get_data == 'pailing'){
							$('.pailing-type-shape').show();
							$('.picket-type-shape').hide();
							$('.select-capping').show();
						}else{
							$('.picket-type-shape').show();
							$('.pailing-type-shape').hide();
							$('.select-capping').hide();
						}
						_this.parent().parent().parent().toggleClass('select-active-card').siblings().removeClass('select-active-card');

						var _has_active = $('.select-type-fence .row > div').hasClass('select-active-card');

						if(_has_active){
							show_hide_nextbutton('show');
						}else{
							show_hide_nextbutton('hide');
						}
					});

				},

				getValue: function() {
					return _input_fence_type.val();
				},

				onClick: function() {
					//$(document).on('click', '.js-fence-type', function(e){
					$('.js-fence-type').on('click', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('fence-type');
						return _get_data;
					});
				},

		  }
		})();

		var SelectFenceTypeShape = (function () {
			var _input_fence_type_shape = $('#input-js-fence-type-shape');

		  return {

				set: function() {
					var _cookie_prefix = 'fence-type-shape';
					var _get_cookie = '';

					//$('.js-fence-type-shape').on('click', function(e){
					$(document).on('click', '.js-fence-type-shape', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('type-shape');

						_input_fence_type_shape.val(_get_data);

						_this.parent().parent().parent().toggleClass('select-active-card').siblings().removeClass('select-active-card');
					});

				},

				getValue: function() {
					return _input_fence_type_shape.val();
				},

		  }
		})();

		var SelectTimberSpecies = (function () {
			var _input_timber_species = $('#input-js-timber-species');

		  return {

				set: function() {
					var _cookie_prefix = 'timber-species';
					var _get_cookie = '';

					$(document).on('click', '.js-timber-species', function(e){
						e.preventDefault();
						var _this = $(this);
						var _get_data = _this.data('timber-species');

						_input_timber_species.val(_get_data);

						_this.parent().parent().parent().toggleClass('select-active-card').siblings().removeClass('select-active-card');

						var _has_active = $('.select-timber-species .row > div').hasClass('select-active-card');

						if(_has_active){
							show_hide_nextbutton('show');
						}else{
							show_hide_nextbutton('hide');
						}
					});

				},

				getValue: function() {
					return _input_timber_species.val();
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

						_this.parent().parent().parent().toggleClass('select-active-card').siblings().removeClass('select-active-card');

						var _has_active = $('.select-capping > div').hasClass('select-active-card');

						if(_has_active){
							show_hide_nextbutton('show');
						}else{
							show_hide_nextbutton('hide');
						}
					});

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

						_this.parent().parent().parent().toggleClass('select-active-card').siblings().removeClass('select-active-card');

						var _has_active = $('.select-plinth > div').hasClass('select-active-card');
						if(_has_active){
							show_hide_nextbutton('show');
						}else{
							show_hide_nextbutton('hide');
						}

					});

				},

				getValue: function() {
					return _input_plinth_val.val();
				},

				getPlinthLabel: function() {
					return _input_plinth.val();
				},
		  }
		})();

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
						_plinth = 150;
					}else if(_get_plinth == 2){
						_plinth = 300;
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
						_calc = ( _length_m / _calc_capping_location );
					}

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
				show_hide_next_prev_button('hide');
				toggle_ajax_spinners('show');
				$('.js-height').hide();
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
					show_hide_next_prev_button('show');
					toggle_ajax_spinners('hide');
					_js_height_select.show();
					show_hide_nextbutton('show');
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
							_ajaxLocationTypeShape(_location, _fence_type, _fence_shape);
						}

					});

				},
			}
		})();

		var AjaxGetTimberSpecies = (function(){
			var _select_height;
			var _tab_container_id;
			var _tab_id;
			var _has_js_timber_species;

			function _ajaxTimberSpecies(
				location,
				fence_type,
				fence_shape,
				board_height
			) {
				var data = {
					'action': 'get_timber_species',
					'location': location,
					'fence_type': fence_type,
					'fence_shape': fence_shape,
					'board_height': board_height,
				};
				show_hide_next_prev_button('hide');
				toggle_ajax_spinners('show');
				var request = $.ajax({
					url: ajax_object.ajax_url,
					method: "POST",
					data: data,
					dataType: "json"
				});

				request.success(function( msg ) {
					console.log(msg);
					var _js_timber_species = $('.js-timber-species-container');

					$.each(msg.data,function(key, value){
						var _card = '<div class="col-sm-3 timber-species-col">';
							 _card += '<div class="card text-center">';
								_card += '<img class="card-img-top" src="'+value.image+'" alt="">';
								_card += '<div class="card-body">';
									_card += '<a href="#" class="js-timber-species" data-timber-species="'+value.slug+'">'+value.name+'</a>';
								_card += '</div>';
							_card += '</div>';
						_card += '</div>';
						_js_timber_species.append(_card);
					});
					show_hide_next_prev_button('show');
					toggle_ajax_spinners('hide');
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
						var _board_height = SelectBoardHeight.getValue();

						var current_target = e.target;

						_tab_container_id = $(current_target).attr('aria-controls');
						_tab_id = $('#' + _tab_container_id);

						_has_js_timber_species = _tab_id.find('.js-timber-species-container');
						if(_has_js_timber_species.length == 1){
							_has_js_timber_species.empty();
							_ajaxTimberSpecies(
								_location,
								_fence_type,
								_fence_shape,
								_board_height
							);
						}

					});

				},
			}
		})();


		var AjaxGetWidth = (function(){
			var _select_width;

			var _tab_container_id;
			var _tab_id;
			var _has_js_width;

			function _ajaxLocationTypeShapeHeightSpecies(
				location,
				fence_type,
				fence_shape,
				board_height,
				timber_species
			) {
				var data = {
					'action': 'get_location_type_shape_height_species',
					'location': location,
					'fence_type': fence_type,
					'fence_shape': fence_shape,
					'board_height': board_height,
					'timber_species': timber_species,
				};
				show_hide_next_prev_button('hide');
				toggle_ajax_spinners('show');
				$('.js-width').hide();

				var request = $.ajax({
					url: ajax_object.ajax_url,
					method: "POST",
					data: data,
					dataType: "json"
				});

				request.success(function( msg ) {
					console.log(msg);
					var _js_width_select = $('.js-width');

					$.each(msg.data,function(key, value){
					    _js_width_select.append('<option value=' + value + '>' + value + '</option>');
					});
					show_hide_next_prev_button('show');
					toggle_ajax_spinners('hid');
					$('.js-width').show();
					show_hide_nextbutton('show');
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
						var _board_height = SelectBoardHeight.getValue();
						var _timber_species = SelectTimberSpecies.getValue();

						var current_target = e.target;

						_tab_container_id = $(current_target).attr('aria-controls');
						_tab_id = $('#' + _tab_container_id);

						_has_js_width = _tab_id.find('.js-width');
						if(_has_js_width.length == 1){
							_has_js_width.empty();

							_ajaxLocationTypeShapeHeightSpecies(
								_location,
								_fence_type,
								_fence_shape,
								_board_height,
								_timber_species
							);
						}

					});

				},
			}
		})();

		var AjaxPicketShapeType = (function(){
			var _tab_container_id;
			var _tab_id;
			var _has_js_picket_shapes_container;

			function _ajaxLocationPicketShape(
				location,
				fence_type,
			) {
				var data = {
					'action': 'get_location_type',
					'location': location,
					'fence_type': fence_type
				};

				show_hide_next_prev_button('hide');

				toggle_ajax_spinners('show');

				var request = $.ajax({
					url: ajax_object.ajax_url,
					method: "POST",
					data: data,
					dataType: "json"
				});

				request.success(function( msg ) {
					console.log(msg);
					var _js_picket_shape_select = $('.js-picket-shapes-container');

					$.each(msg.data,function(key, value){
						var _card = '<div class="col-sm-3 fence-type-col">';
							 _card += '<div class="card text-center">';
								_card += '<img class="card-img-top" src="'+value.image+'" alt="">';
								_card += '<div class="card-body">';
									_card += '<a href="#" class="js-fence-type-shape" data-type-shape="'+value.slug+'">'+value.name+'</a>';
								_card += '</div>';
							_card += '</div>';
						_card += '</div>';
						_js_picket_shape_select.append(_card);
					});

					show_hide_next_prev_button('show');
					toggle_ajax_spinners('hide');
					show_hide_nextbutton('show');
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

						var current_target = e.target;

						_tab_container_id = $(current_target).attr('aria-controls');
						_tab_id = $('#' + _tab_container_id);

						_has_js_picket_shapes_container = _tab_id.find('.js-picket-shapes-container');
						if(_has_js_picket_shapes_container.length == 1){
							_has_js_picket_shapes_container.empty();

							_ajaxLocationPicketShape(
								_location,
								_fence_type
							);
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
						console.log('current ');
						console.log(current_target);
					  var previous_target = e.relatedTarget;
						console.log('prev ');
						console.log(previous_target);

						if($(current_target).data('index') > 0){
							show_hide_nextbutton('hide');
						}else{
							show_hide_nextbutton('show');
						}
						var _fence_type = SelectFenceType.getValue();

						if($(current_target).hasClass('is-last-step-yes')){
							CalculateTimberUnits.init();
							CalculateVerticalFencePost.init();
							CalculateMinHeightVerticalFencePost.init();
							CalculateTimberCappingUnits.init();
							CalculateFixings.init();
							CalculateOverLappingTimberUnits.init();
							CalculateHorizontalSupportRail.init();
							CalculateTotalPicketPailing.init();
						}
						if($(current_target).hasClass('select-fence-type-shape') && _fence_type == 'pailing'){
							$('#stepTab li .select-type-fence').tab('show');
						}
					});
				},
			}
		})();

		$(document).ready(function() {
			show_hide_next_prev_button('hide');
			SelectLocation.set();
			SelectFenceType.set();
			SelectFenceTypeShape.set();
			SelectTimberSpecies.set();
			SelectCapping.set();
			SelectPlinth.set();
			CurrentStep.set();

			TabCalc.init();
			AjaxLocationTypeShape.init();
			AjaxGetTimberSpecies.init();
			AjaxGetWidth.init();
			AjaxPicketShapeType.init();

			$('.btnNext').click(function() {
				var _this = $(this);
				var _tab_id = _this.data('tab-id');
				var _fence_type = $('#' + _tab_id).find('#input-js-fence-type').val();
				if(_fence_type == 'pailing'){
					$('#stepTab li .select-length-height').tab('show');
				}else{
					$('.nav-tabs .active').parent().next('li').find('a').trigger('click');
				}
			});

			$('.btnPrevious').click(function() {
				$('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
			});

		});

	});
})( jQuery );
