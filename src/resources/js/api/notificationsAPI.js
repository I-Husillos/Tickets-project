export class NotificationsAPI{
    constructor(guard = 'user'){
        this.guard = guard; // 'user' | 'admin'
        this.baseUrl = `/api/${guard}/notifications`;
        this.token = this.getToken();
    }

    async fetchPaginated(params = {}) {
        try{
            const queryParams = new URLSearchParams({
                draw: params.draw || 1,
                start: params.length || 0,
                length: params.length || 10,
                type: params.type || '',
                'search[value]': params.search || '',
            });

            const response = await fetch(
                `${this.baseUrl}?${queryParams.toString()}`,
                this.getRequestOptions('GET')
            );

            if(!response.ok){
                throw new Error(`HTTP ${response.status}`);
            }

            return await response.json();
        }catch (error){
            console.error('Error fetching notifications: ', error)
            throw error;
        }
    }

    async markAsRead(notificationId){
        return this.updateStatus(notificationId, 'unread');
    }

    async updateStatus(notificationId, action){
        try{
            const response = await fetch(
                `${this.baseUrl}/${notificationId}/${action}`,
                this.getRequestOptions('PATCH')
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            return await response.json();
        } catch (error) {
            console.error(`Error marking as ${action}:`, error);
            throw error;
        }
    }

    getRequestOptions(method = 'GET'){
        const locale = document.documentElement.lang || 'es';

        return{
            method,
            headers:{
                'Authorization': `Bearer ${this.token}`,
                'Accept': 'application/json',
                'X-Locale': locale,
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json',
            }
        };
    }

    getToken(){
        return localStorage.getItem('api_token') || '';
    }
}

