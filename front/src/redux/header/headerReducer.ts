import {HEADER} from './headerAction';

const HEADER_INITIAL_STATE = {
	isHeaderVisible: false
};

export default function headerReducer(state = HEADER_INITIAL_STATE, action:any) {
	switch (action.type) {
		// case HEADER:
			// return {isHeaderVisible: true, ...action.payload};

		default:
			return state;
	}
}
