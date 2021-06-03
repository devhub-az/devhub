import { CREATE_ARTICLE } from "../actions/actionTypes";

const initialState = {
    articles: [],
}

export const articlesReducer = (state = initialState, action:any) => {
    switch(action.type) {
        case CREATE_ARTICLE:
            return {...state, articles: [...state.articles, action.article]};
        break;

        default:
            return state;
    }
}
