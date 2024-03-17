export interface Event {
    // columns
    id: string;
    group_id: string | null;
    name: string;
    slug: string;
    city: string | null;
    country: string | null;
    description: string | null;
    start: string;
    end: string;
    created_at: string | null;
    updated_at: string | null;
    // mutators
    link: string;
    // relations
    group: Group;
    users: User[];
    results: Result[];
    interested: User[];
    attending: User[];
}

export interface Group {
    // columns
    id: string;
    name: string;
    slug: string;
    description: string;
    city: string;
    country: string;
    created_at: string | null;
    updated_at: string | null;
    // mutators
    link: string;
    // relations
    events: Event[];
    users: User[];
}

export interface Player {
    // columns
    id: string;
    user_id: string | null;
    first_name: string;
    last_name: string;
    gender: string;
    country: string | null;
    membership: number;
    last_active: string;
    created_at: string | null;
    updated_at: string | null;
    // relations
    user: User;
    teams: Team[];
}

export interface Result {
    // columns
    id: string;
    key: string;
    event_id: string;
    division: string;
    round: number;
    pool: string;
    created_at: string | null;
    updated_at: string | null;
    // relations
    teams: Team[];
    event: Event;
}

export interface Team {
    // columns
    id: string;
    result_id: string;
    place: number;
    points: number;
    created_at: string | null;
    updated_at: string | null;
    // relations
    players: Player[];
    result: Result;
}

export interface User {
    // columns
    id: string;
    name: string;
    email: string;
    email_verified_at: string | null;
    password?: string;
    remember_token?: string | null;
    created_at: string | null;
    updated_at: string | null;
    // relations
    groups: Group[];
    events: Event[];
    player: Player;
    tokens: PersonalAccessToken[];
    notifications: DatabaseNotification[];
}
