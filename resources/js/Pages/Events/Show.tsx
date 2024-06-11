import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";
import { Event } from "@/types/types";

type ShowPageProps = PageProps<{
    event: Event;
}>;

export default function Show({ auth, event }: ShowPageProps) {
    return (
        <>
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            page for "{event.name}"
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
