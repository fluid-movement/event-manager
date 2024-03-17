import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";
import { Heading } from "@radix-ui/themes";

export default function Dashboard(props: PageProps) {
    console.log(props);
    return (
        <AuthenticatedLayout
            user={props.auth.user}
            header={
                <Heading className="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </Heading>
            }
        >
            <Head title="Dashboard" />
        </AuthenticatedLayout>
    );
}
