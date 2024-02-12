/**
 * This file is auto generated using 'php artisan typescript:generate'
 *
 * Changes to this file will be lost when the command is run again
 */

declare namespace App.Models {
    export interface Event {
        id: string;
        group_id: string;
        name: string;
        slug: string;
        city: string | null;
        country: string | null;
        description: string | null;
        start: string;
        end: string;
        created_at: string | null;
        updated_at: string | null;
        group?: App.Models.Group | null;
        users?: Array<App.Models.User> | null;
        interested?: Array<App.Models.User> | null;
        attending?: Array<App.Models.User> | null;
        users_count?: number | null;
        interested_count?: number | null;
        attending_count?: number | null;
    }

    export interface Group {
        id: string;
        name: string;
        slug: string;
        description: string;
        city: string;
        country: string;
        created_at: string | null;
        updated_at: string | null;
        events?: Array<App.Models.Event> | null;
        users?: Array<App.Models.User> | null;
        events_count?: number | null;
        users_count?: number | null;
    }

    export interface User {
        id: string;
        name: string;
        email: string;
        email_verified_at: string | null;
        password: string;
        remember_token: string | null;
        created_at: string | null;
        updated_at: string | null;
        groups?: Array<App.Models.Group> | null;
        events?: Array<App.Models.Event> | null;
        groups_count?: number | null;
        events_count?: number | null;
    }
}
