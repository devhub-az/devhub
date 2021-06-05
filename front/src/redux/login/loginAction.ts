//  function that return function
import {useDispatch} from 'react-redux';
//  action type
export const LOGIN = 'LOGIN';

//  action function, that return login action object
const signInAction = (data:any) => {
	return {
		type: LOGIN,
		payload: data,
	};
}

//  in tsx we write dispatch(signIn(login, password, event.nativeEvent.data)) to set data
//  const isSigned = useSelector(state => state.loginReducer).isSigned; to take data
export const signIn = (login:any, password:any, recaptcha:any) => {
    return (dispatch = useDispatch()) => {
        (async () => {
            try {
                /**
                 *  here we write axios request use "await"
                 *  then dispatch(signInAction(->response json<-));
                 *  so after that our data in the global store in loginReducer in payload field
                */
            }
            catch (error) {

            }
        })();
    }
}
