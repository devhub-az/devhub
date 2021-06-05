//  function that return function
import {useDispatch} from 'react-redux';
//  action type
export const HEADER = 'HEADER';

//  action function, that return login action object
const toggleHeaderAction = (data:any) => {
	return {
		type: HEADER,
		payload: data,
	};
}

export const toggleHeader = () => {
    return (dispatch = useDispatch()) => {
        (async () => {
            // dispatch(signInAction(->response json<-));
        })();
    }
}
