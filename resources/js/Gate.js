export default class Gate {

    constructor(user){
        this.user = user;
    }

    isAdmin(){
        return this.user.type === 'admin'
    }

    isAuthur(){
        return this.user.type === 'authur'
    }

    isUser(){
        return this.user.type === 'user'
    }
    isAdminOrAuthor(){
        // return this.user.type === 'admin' || this.user.type ==='author';
        if(this.user.type === 'admin' || this.user.type ==='author'){
            return true;
        }
    }
    isUserOrAuthor(){
        // return this.user.type === 'admin' || this.user.type ==='author';
        if(this.user.type === 'user' || this.user.type ==='author'){
            return true;
        }
    }
}