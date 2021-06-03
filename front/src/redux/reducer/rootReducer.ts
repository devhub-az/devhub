import { combineReducers } from "redux";
import { articlesReducer } from "./articlesReducer";

export const rootReducer = combineReducers({
    articles: articlesReducer
});
