import {LOGIN} from './loginAction';

const LOGIN_INITIAL_STATE = {
	isSigned: false
};

export default function loginReducer(state = LOGIN_INITIAL_STATE, action:any) {
	switch (action.type) {
		case LOGIN:
			return {isSigned: true, ...action.payload};
		default:
			return state;
	}
}
