import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";
import { Group } from "@/types/types";

type ShowPageProps = PageProps<{
    group: Group;
}>;

export default function Show({ auth, group }: ShowPageProps) {
    return (
        <>
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            page for "{group.name}"
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
