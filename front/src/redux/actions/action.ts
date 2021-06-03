import { CREATE_ARTICLE, SHOW_LOADER, HIDE_LOADER} from "./actionTypes"

const createArticle = (article:any) => {
    return {
        type: CREATE_ARTICLE,
        article
    }
}

const showLoader = () => {
    return {
        type: SHOW_LOADER
    }
}

const hideLoader = () => {
    return {
        type: HIDE_LOADER
    }
}

export {createArticle, showLoader, hideLoader};
