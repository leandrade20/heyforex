/* global $, local_vars*/
import 'jquery-validation';

const {api_url, use_new_mt4_client} = local_vars;
const API_URL = api_url;

// Flash Message
const showalert = (message, alert_type) => {

	$('body').find('.popup_message').html('');
	$('body').find('.popup_message').css('display', 'block');
	$('body').find('.popup_message').html('<div id="gobal_alert_message"><div class="alert ' + alert_type + ' alert-dismissible">' + message + '</div></div>');

	setTimeout(function () {
		$('#gobal_alert_message').remove();
	}, 10000);
	$(window).scrollTop(0);
};

const validateForm = ($id, $rules, $messages, submit) => {
	// Methods
	$.validator.addMethod('strongPassword', function (value) {
		return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,}/g.test(value);
	}, 'minimum 8 characters at least 1 uppercase, 1 lowercase alphabet and 1 number and special character.');

	$.validator.addMethod('textonly', function (value, element) {
		return this.optional(element) || /^[a-z," "]+$/i.test(value);
	}, 'Please enter text only characters. e.g. Aa - Zz');

	$($id).validate({
		debug: false,
		rules: $rules,
		messages: $messages,
		submitHandler: () => {  
			submit();
			return false;
		}
	});
};

// User Acc
const userRules = {
	firstName: {
		required: true,
		maxlength: 25,
		textonly: true
	},
	surname: {
		required: true,
		maxlength: 25,
		textonly: true
	},
	email: {
		required: true,
		maxlength: 100,
	},
	password: {
		required: true,
		maxlength: 100,
		strongPassword: true
	},
};

const userMessages = {
	firstName: {
		required: 'Please specify your first name',
		firstName: 'Please enter only text',
	},
	surname: {
		required: 'Please specify your last name',
		firstName: 'Please enter only text',
	},
	email: {
		required: 'Please specify your email',
		email: 'Your email address must be in the format of name@domain.com'
	},
	password: {
		required: 'You need to enter a strong password',
		password: 'You need to enter a strong password'
	}
};

const submitCreateUser = () => { 
	const data = $('#hw-live :input').serializeArray();
	$.ajax({
		url: `${API_URL}/user-request`,
		type: 'POST',
		dataType: 'json',
		data,
		beforeSend: () => {
			$('.submit_loader').show();
			$('.submit').hide();
		},
		complete: () => {
			$('.submit_loader').hide();
			$('.submit').show();
		}
	})
		.done(function (res) {
			showalert(`Success, an email has been sent to ${res.email}.`, 'alert-success');
			$('#open-live :input').val('');
			//for goole analytics
			setTimeout(() => {
				window.location.replace('?conversion=true');
			}, 2000);
		})
		.fail(function (error) {
			showalert(error.responseJSON.message, 'alert-danger');
		});

	return false;
};

validateForm('#hw-live', userRules, userMessages, submitCreateUser);

// Demo Account
const demoRules = {
	firstName: {
		required: true,
		maxlength: 25,
		textonly: true
	},
	surname: {
		required: true,
		maxlength: 25,
		textonly: true
	},
	email: {
		required: true,
		maxlength: 100,
	},
	balance: {
		required: true,
	},
	leverage: {
		required: true,
	},
};

const demoMessages = {
	firstName: {
		required: 'Please specify your first name',
		firstName: 'Please enter only text',
	},
	surname: {
		required: 'Please specify your last name',
		firstName: 'Please enter only text',
	},
	email: {
		required: 'We need your email address.',
		email: 'Your email address must be in the format of name@domain.com'
	},
	balance: {
		required: 'Choose a balance on the account',
		balance: 'Choose a balance on the account'
	},
	leverage: {
		required: 'Choose a leverage on the account',
		leverage: 'Choose a leverage on the account'
	}
};

const submitDemoAccount = () => { 
	const data = $('#hw-demo :input').serializeArray();
	const useNewClient =  use_new_mt4_client === '1' ? true : false; 
	const obj = {
		user: {
			firstName: data[0].value,
			surname: data[1].value,
			email: data[2].value
		},
		leverage: data[3].value,
		balance: data[4].value,
		useNewClient
	};

	$.ajax({
		url: `${API_URL}/account/open-demo`,
		type: 'POST',
		dataType: 'json',
		data: obj,
		beforeSend: () => {
			$('.submit_loader').show();
			$('.submit').hide();
		},
		complete: () => {
			$('.submit_loader').hide();
			$('.submit').show();
		}
	})
		.done(function (res) {
			showalert(`${res.message}`, 'alert-success');
			$('#open-demo').trigger('reset');
			//for goole analytics
			setTimeout(() => {
				window.location.replace('?conversion=true');
			}, 2000);
		})
		.fail(function (error) {
			console.log('Error', error);
			showalert(error.responseJSON.message, 'alert-danger');
		})
		.always(function() {
			console.log('complete');
		});

	return false;
};

validateForm('#hw-demo', demoRules, demoMessages, submitDemoAccount);