import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";
import { Container, Separator } from "@radix-ui/themes";
import EventCard from "./_components/EventCard";
import Filter from "./_components/Filter";
import { useState } from "react";
import { Event } from "@/types/types";

type EventsPageProps = {
    auth: PageProps["auth"];
    events: Event[];
};

export default function All({ auth, events }: EventsPageProps) {
    const [filteredEvents, setFilteredEvents] = useState(events);
    const [filter, setFilter] = useState<string | number>("");

    const onSearch = (value: string) => {
        const filtered = events.filter((event) =>
            event.name.toLowerCase().includes(value.toLowerCase())
        );
        setFilteredEvents(filtered);
    };

    const onFilter = (value: string | number) => {
        setFilter(value);

        if (value === "" || !value) {
            setFilteredEvents(events);
            return;
        }

        const filtered = events.filter((event) => {
            if (value === "upcoming") {
                return Date.parse(event.start) > Date.now();
            }

            if (typeof value === "number") {
                return new Date(event.start).getFullYear() === value;
            }
        });
        setFilteredEvents(filtered);
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Events - All
                </h2>
            }
        >
            <Head title="Dashboard" />

            <Container size="3">
                {/* Filter / Search */}
                <Filter
                    onSearch={onSearch}
                    onFilter={onFilter}
                    filter={filter}
                />

                <Separator mt="4" mb="4" size="4" />

                {/* Events */}
                {filteredEvents.map((event) => (
                    <EventCard event={event} key={event.id} />
                ))}
            </Container>
        </AuthenticatedLayout>
    );
}
