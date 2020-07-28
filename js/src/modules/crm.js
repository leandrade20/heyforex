/* global $, local_vars*/
import 'jquery-validation';
import { errMap } from './errors';
// console.log('test', errMap);

// console.log('test', errMap);

const { api_url, use_new_client } = local_vars;
const API_URL = api_url;

// console.log(api_url);

$('#showPass').on('click', function () {
	var type = $('#password').attr('type');
	if (type === 'password') {
		$('#password').attr('type', 'text');
	} else {
		$('#password').attr('type', 'password');
	}
});

// Flash Message
const showalert = (message, alert_type) => {

	$('.modal').find('.popup_message').html('');
	$('.modal').find('.popup_message').css('display', 'block');
	$('.modal').find('.popup_message').html('<div id="gobal_alert_message"><div class="alert ' + alert_type + ' alert-dismissible">' + message + '</div></div>');

	setTimeout(function () {
		$('#gobal_alert_message').remove();
	}, 10000);
	$(window).scrollTop(0);
};

// Flash Message
const showalertDemo = (message, alert_type) => {

	$('.demo-form').find('.popup_message').html('');
	$('.demo-form').find('.popup_message').css('display', 'block');
	$('.demo-form').find('.popup_message').html('<div id="gobal_alert_message"><div class="alert ' + alert_type + ' alert-dismissible">' + message + '</div></div>');

	setTimeout(function () {
		$('#gobal_alert_message').remove();
	}, 10000);
	$(window).scrollTop(0);
};

const validateForm = ($id, $rules, $messages, submit) => {
	// Methods
	$.validator.addMethod('strongPassword', function (value) {
		return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,}$/i.test(value);
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
	const data = {
		firstName: $('#firstName').val(),
		surname: $('#surname').val(),
		email: $('#email').val(),
		password: $('#password').val(),
		isCompany: false,
		affiliatedTo: $('#affiliatedTo').val(),
		campaignId: $('#campaignId').val()
	};
	$.ajax({
		url: `${API_URL}/user-request`,
		type: 'POST',
		contentType: 'application/json',
		dataType: 'json',
		data: JSON.stringify(data),
		beforeSend: () => {
			$('.submit_loader').show();
			$('.submit').hide();
		},
		complete: () => {
			$('.submit_loader').hide();
			$('.submit').show();
		}
	})
		.done(function () {
			showalert(`Success, an email has been sent to ${data.email}.`, 'alert-success');

			$('#open-live :input').val('');

			// for google analytics
			setTimeout(() => {
				window.location.replace('?conversion-signup=true');
			}, 2000);
		})

		.fail(function (error) {

			if (!errMap[error.responseJSON.message]) {
				showalert(error.responseJSON.message, 'alert-danger');
			}
			showalert(errMap[error.responseJSON.message], 'alert-danger');
			//showalert(error.responseJSON.message, 'alert-danger');
			// showalert(errMap.responseJSON.message, 'alert-danger');
		});

	return false;
};

validateForm('#hey-live', userRules, userMessages, submitCreateUser);

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

	const useNewClient = use_new_client === '1' ? true : false;


	const data = {
		leverage: $('#hey-demo #leverage').val(),
		balance: $('#hey-demo #balance').val(),
		user: {
			firstName: $('#hey-demo #firstName').val(),
			surname: $('#hey-demo #surname').val(),
			email: $('#hey-demo #email').val(),
		},
		useNewClient
	};


	$.ajax({
		url: `${API_URL}/account/open-demo`,
		type: 'POST',
		contentType: 'application/json',
		dataType: 'json',
		data: JSON.stringify(data),
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
			showalertDemo(`${res.message}`, 'alert-success');
			$('#hey-demo #open-demo').trigger('reset');

			//for goole analytics
			setTimeout(() => {
				window.location.replace('?conversion-demo=true');
			}, 2000);

		})
		.fail(function (error) {
			if (!errMap[error.responseJSON.message]) {
				showalertDemo(error.responseJSON.message, 'alert-danger');
			}
			showalertDemo(errMap[error.responseJSON.message], 'alert-danger');

		})
		.always(function () {
			// console.log('complete');
			// console.log(data);
		});

	return false;
};

validateForm('#hey-demo', demoRules, demoMessages, submitDemoAccount);