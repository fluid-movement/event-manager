import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";

export default function Create({ auth }: PageProps) {
    return (
        <>
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">create a group</div>
                    </div>
                </div>
            </div>
        </>
    );
}
